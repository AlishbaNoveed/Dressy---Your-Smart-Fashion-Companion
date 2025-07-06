<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        Cart::instance('cart')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request)
    {
        $coupon_code = $request->coupon_code;
        if ($coupon_code) {
            $subtotal = floatval(str_replace([',', '₨', '$'], '', Cart::instance('cart')->subtotal()));
            $coupon = Coupon::where('code', $coupon_code)->where('expiry_date', '>=', Carbon::today())
                ->where('cart_value', '<=', $subtotal)->first();

            if (!$coupon) {
                return redirect()->back()->with('error', 'Invalid coupon code!');
            }

            Session::put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]);

            $this->calculateDiscount();
            return redirect()->back()->with('success', 'Coupon has been applied!');
        }

        return redirect()->back()->with('error', 'Invalid coupon code!');
    }

    public function calculateDiscount()
    {
        $discount = 0;
        if (Session::has('coupon')) {
            $subtotal = floatval(str_replace([',', '₨', '$'], '', Cart::instance('cart')->subtotal()));
            $discount = Session::get('coupon')['type'] === 'fixed'
                ? Session::get('coupon')['value']
                : ($subtotal * Session::get('coupon')['value']) / 100;

            $subtotalAfterDiscount = $subtotal - $discount;
            $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax')) / 100;
            $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

            Session::put('discounts', [
                'discount' => number_format($discount, 2, '.', ''),
                'subtotal' => number_format($subtotalAfterDiscount, 2, '.', ''),
                'tax' => number_format($taxAfterDiscount, 2, '.', ''),
                'total' => number_format($totalAfterDiscount, 2, '.', '')
            ]);
        }
    }

    public function remove_coupon_code()
    {
        Session::forget('coupon');
        Session::forget('discounts');
        return back()->with('status', 'Coupon has been removed!');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route("login");
        }

        $address = Address::where('user_id', Auth::id())->where('isdefault', 1)->first();
        return view('checkout', compact("address"));
    }

    public function place_an_order(Request $request)
      {
        $user_id = Auth::id();
           $request->validate([
        'mode' => 'required|in:card,stripe,cod',
         ]);
        // Validate address if not saved
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

        // Create Order
        $order = Order::create([
            'user_id' => $user_id,
            'subtotal' => floatval(str_replace(',', '', $checkout['subtotal'])),
            'discount' => floatval(str_replace(',', '', $checkout['discount'])),
            'tax' => floatval(str_replace(',', '', $checkout['tax'])),
            'total' => floatval(str_replace(',', '', $checkout['total'])),
            'name' => $address->name,
            'phone' => $address->phone,
            'locality' => $address->locality,
            'address' => $address->address,
            'city' => $address->city,
            'state' => $address->state,
            'country' => $address->country,
            'landmark' => $address->landmark,
            'zip' => $address->zip,
        ]);


        foreach (Cart::instance('cart')->content() as $item) {
            OrderItem::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        // Handle Stripe Payment
        if ($request->mode == "stripe" && $request->has('stripe_payment_method')) {
            try {
                Stripe::setApiKey(env('STRIPE_SECRET'));
                $paymentIntent = PaymentIntent::create([
                    'amount' => intval($order->total * 100), // amount in cents
                    'currency' => 'usd',
                    'payment_method' => $request->stripe_payment_method,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);

                if ($paymentIntent->status === 'requires_action') {
                    return response()->json(['requires_action' => true, 'payment_intent_client_secret' => $paymentIntent->client_secret]);
                }

                Transaction::create([
                    'user_id' => $user_id,
                    'order_id' => $order->id,
                    'mode' => 'stripe',
                    'status' => 'approved',
                    'transaction_id' => $paymentIntent->id,
                ]);
            } catch (ApiErrorException $e) {
                return redirect()->route('cart.checkout')->with('error', 'Payment failed: ' . $e->getMessage());
            }
        }

        // Cash on Delivery
        elseif ($request->mode == "cod") {
            Transaction::create([
                'user_id' => $user_id,
                'order_id' => $order->id,
                'mode' => 'cod',
                'status' => 'pending',
            ]);
        }

        // Clear Cart & Session
        Cart::instance('cart')->destroy();
        Session::forget(['checkout', 'coupon', 'discounts']);
        Session::put('order_id', $order->id);

        return redirect()->route('cart.order.confirmation');
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }

        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => Session::get('discounts')['discount'],
                'subtotal' => Session::get('discounts')['subtotal'],
                'tax' => Session::get('discounts')['tax'],
                'total' => Session::get('discounts')['total']
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function order_confirmation()
    {
        if (Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
            return view('order-confirmation', compact('order'));
        }

        return redirect()->route('cart.index');
    }
}
