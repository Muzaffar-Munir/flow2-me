<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkOut(Request $request){

        $request->validate([
            'phone'=>'required',
            'address'=>'required'

        ]);
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        // $orderNumber = 'ORD-' . str_random(2);
        $orderNumber = rand(10000000, 99999900); // You can adjust the range as needed
        // dd($orderNumber);
        foreach ($cartItems as $cartItem) {
            Order::create([
                'user_id' => $user->id,
                'product_id' => $cartItem->product_id,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => 'approved',
                'uon'=>$orderNumber,
            ]);
        }
        // Delete the cart items
        Cart::where('user_id', $user->id)->delete();

        return redirect()->back();




    }
}


