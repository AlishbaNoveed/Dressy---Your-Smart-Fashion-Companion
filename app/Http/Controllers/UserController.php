<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders()
    {
      $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
      return view('user.orders',compact('orders'));
    }

    public function order_details($order_id)
    {
        $order = Order::where('user_id',Auth::user()->id)->where('id',$order_id)->first();      
        if($order)
        {
        $orderItems = OrderItem::where('order_id',$order_id)->orderBy('id')->paginate(12);
        $transaction = Transaction::where('order_id',$order_id)->first();  
        return view('user.order-details',compact('order','orderItems','transaction'));
        }
        else
        {
        return redirect()->route('login');
        }
    }

    public function order_cancel(Request $request)
    {
    $order = Order::find($request->order_id);
    $order->status = "canceled";
    $order->canceled_date = Carbon::now();
    $order->save();
    return back()->with("status", "Order has been cancelled successfully!");
    }

    public function user_address()
    {
        $order = Order::where('user_id', Auth::id())->latest('created_at') ->first();
       return view('user.account-address', compact('order'));
    }

    public function account_details()
    {
       return view('user.account-details');
    }

    public function update_password(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Check if the old password is correct
    if (!Hash::check($request->old_password, $user->password)) {
        return back()->withErrors(['old_password' => 'Your current password is incorrect.']);
    }

    // Update the new password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('status', 'Password updated successfully!');
}
}
