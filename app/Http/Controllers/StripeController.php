<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Session;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function stripePost(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $orderNumber = rand(10000000, 99999900);

        try {
            // Set your Stripe API key
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a Stripe charge
            Stripe\Charge::create([
                "amount" => $request->price * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "Received payment from " . Auth::user()->email,
            ]);

            // Save order data in the database
            foreach ($cartItems as $cartItem) {
                Order::create([
                    'user_id' => $user->id,
                    'product_id' => $cartItem->product_id,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'status' => 'approved',
                    'uon' => $orderNumber,
                ]);
            }

            // Delete the cart items
            Cart::where('user_id', $user->id)->delete();

            Session::flash('success', 'Payment Successful!, your order is created');
            return redirect()->back();
        } catch (Stripe\Error\Base $e) {
            // Handle Stripe errors, you can log or display an error message to the user.
            Session::flash('error', 'Payment Failed. Please try again later.');
            return redirect()->back();
        }
    }
}