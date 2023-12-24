<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_accounts=User::with('account')->get();          
        return view('user-account.index',compact('user_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            // $userId = Auth::user()->id;
            $userAccount = Account::where('user_id',$id)->first();
            if($userAccount == null)
            {
                $userAccount = new Account();
                $userAccount->user_id = $id;
            }
            $userAccount->balance = $request->balance;
            $userAccount->save();
            Session::flash('success', 'User Account Has Been Saved Successfully.');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Session::flash('error',   $e->getMessage());
            return redirect()->back();
        } 
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user_acccount_delete=User::find($id);
            $user_acccount_delete->delete();
            Session::flash('error','User Account Has Been Deleted Successfully.');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Session::flash('error',   $e->getMessage());
            return redirect()->back();
        }   
    }
}
