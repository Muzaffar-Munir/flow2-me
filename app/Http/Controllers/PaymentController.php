<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function paypal_index(){
        $user = Auth::user();
        $user_id = $user->id;
       $getCarts = Cart::where('user_id', $user_id,'product_id')->with('product')->get();
       $cartItemCount = Cart::where('user_id', $user->id)->count();

        return view('paypal.index',compact('getCarts','cartItemCount'));
    }
    public function handlePayment(Request $request)
    {


            $request->validate([
                'phone' => 'required',
                'address' => 'required'
            ]);

            $user = Auth::user();
            $cartItems = Cart::where('user_id', $user->id)->get();
            // Generate a random order number
            $orderNumber = 'ORD-' . rand(10000000, 99999900); // You can adjust the range as needed

            // Payment handling code
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('success.payment'),
                    "cancel_url" => route('cancel.payment'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => "100.00"
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()
                    ->route('cancel.payment')
                    ->with('error', 'Something went wrong.');
            } else {
                return redirect()
                    ->route('create.payment')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }

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

            return redirect()->back();


        // $provider = new PayPalClient;
        // $provider->setApiCredentials(config('paypal'));
        // $paypalToken = $provider->getAccessToken();
        // $response = $provider->createOrder([
        //     "intent" => "CAPTURE",
        //     "application_context" => [
        //         "return_url" => route('success.payment'),
        //         "cancel_url" => route('cancel.payment'),
        //     ],
        //     "purchase_units" => [
        //         0 => [
        //             "amount" => [
        //                 "currency_code" => "USD",
        //                 "value" => "100.00"
        //             ]
        //         ]
        //     ]
        // ]);
        // if (isset($response['id']) && $response['id'] != null) {
        //     foreach ($response['links'] as $links) {
        //         if ($links['rel'] == 'approve') {
        //             return redirect()->away($links['href']);
        //         }
        //     }
        //     return redirect()
        //         ->route('cancel.payment')
        //         ->with('error', 'Something went wrong.');
        // } else {
        //     return redirect()
        //         ->route('create.payment')
        //         ->with('error', $response['message'] ?? 'Something went wrong.');
        // }
    }
    public function paymentCancel()
    {
        return redirect()
            ->route('create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('create.payment')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


}
