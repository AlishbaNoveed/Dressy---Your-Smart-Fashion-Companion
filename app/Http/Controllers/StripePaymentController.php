<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\Address;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Stripe\PaymentIntent;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    // STEP 1: Redirect to Stripe Checkout
    public function redirectToStripe(Request $request)
    {
        $user_id = Auth::id();

        // Save address if not already present
        $address = Address::where('user_id', $user_id)->where('isdefault', true)->first();
        if (!$address) {
            $request->validate([
                'name' => 'required|max:100',
                'phone' => 'required|numeric|digits:11',
                'zip' => 'required|numeric|digits:6',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'locality' => 'required',
                'landmark' => 'required'
            ]);

            $address = Address::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'zip' => $request->zip,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'locality' => $request->locality,
                'landmark' => $request->landmark,
                'country' => 'Pakistan',
                'isdefault' => true
            ]);
        }

        $this->setAmountForCheckout();
        $checkout = Session::get('checkout');

        if (!$checkout || !isset($checkout['total'])) {
            return redirect()->route('cart.index')->with('error', 'Something went wrong. Checkout session is missing.');
        }

        // Convert total to float for calculation
        $totalAmount = floatval(str_replace(',', '', $checkout['total']));

        Stripe::setApiKey(config('services.stripe.secret'));
        $user = Auth::user();

        if (!$user->stripe_id) {
            $customer = \Stripe\Customer::create([
                'email' => $user->email,
                'name' => $user->name,
            ]);

            $user->stripe_id = $customer->id;
            $user->save();
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'customer' => $user->stripe_id,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Order from ' . config('app.name'),
                    ],
                    'unit_amount' => intval($totalAmount * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect($session->url);
    }

    // STEP 2: On Successful Stripe Payment
    public function handleSuccess(Request $request)
    {
        $user_id = Auth::id();
        $address = Address::where('user_id', $user_id)->where('isdefault', true)->first();
        $checkout = Session::get('checkout');

        if (!$checkout) {
            return redirect()->route('cart.index')->with('error', 'Session expired.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session_id = $request->get('session_id');
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        $payment_intent_id = $session->payment_intent;
        $paymentIntent = PaymentIntent::retrieve($payment_intent_id);

        $convertedTime = Carbon::createFromTimestamp($paymentIntent->created, 'UTC')->setTimezone('Asia/Karachi');

        // Convert to float values
        $subtotal = floatval(str_replace(',', '', $checkout['subtotal']));
        $discount = floatval(str_replace(',', '', $checkout['discount']));
        $tax = floatval(str_replace(',', '', $checkout['tax']));
        $total = floatval(str_replace(',', '', $checkout['total']));

        $order = Order::create([
            'user_id' => $user_id,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total,
            'name' => $address->name ?? 'Stripe User',
            'phone' => $address->phone ?? '0000000000',
            'locality' => $address->locality ?? 'Stripe',
            'address' => $address->address ?? 'Paid via Stripe',
            'city' => $address->city ?? 'N/A',
            'state' => $address->state ?? 'N/A',
            'zip' => $address->zip ?? '000000',
            'country' => $address->country ?? 'Pakistan',
            'landmark' => $address->landmark ?? 'Stripe',
        ]);

        foreach (\Cart::instance('cart')->content() as $item) {
            OrderItem::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        Transaction::create([
            'user_id'        => $user_id,
            'order_id'       => $order->id,
            'mode'           => 'stripe',
            'status'         => 'approved',
            'transaction_id' => $payment_intent_id,
            'created_at'     => $convertedTime,
        ]);

        \Cart::instance('cart')->destroy();
        Session::forget(['checkout', 'discounts', 'coupon']);
        Session::put('order_id', $order->id);

        return redirect()->route('cart.order.confirmation')->with('success', 'Payment successful and order placed!');
    }

    // STEP 3: Handle Cancel
    public function handleCancel()
    {
        return redirect()->route('cart.index')->with('error', 'Payment cancelled.');
    }

    // Utility: Set Checkout Amounts
    public function setAmountForCheckout()
    {
        if (!\Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }

        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => floatval(str_replace(',', '', Session::get('discounts')['discount'])),
                'subtotal' => floatval(str_replace(',', '', Session::get('discounts')['subtotal'])),
                'tax' => floatval(str_replace(',', '', Session::get('discounts')['tax'])),
                'total' => floatval(str_replace(',', '', Session::get('discounts')['total']))
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => floatval(str_replace(',', '', \Cart::instance('cart')->subtotal())),
                'tax' => floatval(str_replace(',', '', \Cart::instance('cart')->tax())),
                'total' => floatval(str_replace(',', '', \Cart::instance('cart')->total())),
            ]);
        }
    }
}
