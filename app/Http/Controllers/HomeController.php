<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;



class HomeController extends Controller
{
    public function index(){

        // $now = Carbon::now();
        // $twentyFourHoursAgo = $now->subHours(24);
        // count all users
        // $totalUsers = User::role('user')->count();
        // register users in 24 hours
        // $totalUsersLast24Hours = User::role('user')->where('created_at', '>=', $twentyFourHoursAgo)->count();
        // count battle
        // $totalBattles = Battle::count();
        // battle in 24 hours
        // $totalBattlesLast24Hours = Battle::where('created_at', '>=', $twentyFourHoursAgo)->count();
        // count orders
        // $totalOrders = Order::count();
        // // orders in 24 hours
        // $totalPendingOrders = Order::where('status', '1')->count();
        // $allOrders  = Order::with('user', 'product')->where('created_at', '>=', $twentyFourHoursAgo)->get();

        // $withDrawAmount = DepositCallback::where('operation_key', 'wirthdraw')->sum('amount');
        // $withDrawcount = DepositCallback::where('operation_key', 'wirthdraw')->count();
        // $depositAmount = DepositCallback::where('operation_key', 'deposit')->sum('amount');
        // $depositcount = DepositCallback::where('operation_key', 'deposit')->count();

        return view('welcome');
    }

    public function user_index(){
        if(Auth::user()){
            $products = Product::where('user_id', Auth::user()->id)->get();
        }
        $user = Auth::user();
        $cartItemCount = Cart::where('user_id', $user->id)->count();

        return view('user-welcome', compact('products','cartItemCount'));

    }
}
