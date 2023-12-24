<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;
       $getCarts = Cart::where('user_id', $user_id,'product_id')->with('product')->get();
    //    dd($getCarts[0]->product->price);

    // dd(($getCarts));

       $totalPrice = 0;

       if($getCarts){
        foreach($getCarts as $cartItem){
            $totalPrice += $cartItem->product->price;
        }
       }

    //    dd(Auth::user()->email);


       $cartItemCount = Cart::where('user_id', $user->id)->count();
       return view('cart.index',compact('getCarts','cartItemCount', 'totalPrice'));
    }

    public function addToCart(Request $request){
        $user = Auth::user();
        $user->cart()->create([
            'product_id' => $request->product_id,

        ]);
        return redirect()->back()->with('success', 'Item is added to  cart!.');
    }
    public function cartRemove(Request $request,$id){
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Item is removed from the cart!.');
    }
}
