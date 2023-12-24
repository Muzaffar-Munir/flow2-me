<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        $user = Auth::user();

        $cartItemCount = Cart::where('user_id', $user->id)->count();
        return view('checkout.index', compact('cartItemCount'));
    }
}
