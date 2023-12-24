<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAccount;
use App\Models\User;
Use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Services\HyperBcService;


class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $hyperBcService;
    public function __construct(HyperBcService $hyperBcService)
    {
        $this->hyperBcService = $hyperBcService;
    }
    public function index()
    {
      $admin_accounts= AdminAccount::with("user")->get();
        return view('admin-account.index',compact('admin_accounts'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeAddress(Request $request)
    {  
        $userId = auth()->user()->id;
        $address = $this->hyperBcService->address_getBatch();
        $selectedAddress = $address['data'][array_rand($address['data'])];
        $adminAccount = AdminAccount::where('user_id',$userId)->first();
        $adminAccount->update([
            'wallet_address' => $selectedAddress,
        ]);
        return back();   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $userId = Auth::user()->id;
           $adminAccount = AdminAccount::where('user_id',$userId)->first();
            if($adminAccount == null)
            {
                $adminAccount = new AdminAccount();
                $adminAccount->user_id = $userId;
            }
            $adminAccount->wallet_address = $request->wallet_address;
            $adminAccount->balance = $request->balance;
            $adminAccount->save();
            Session::flash('success', 'Admin Account  Has Been Saved Successfully!');
            return redirect()->back();  
        }
        catch (\Exception $e) {
            Session::flash('error',   $e->getMessage());
            return redirect()->back();
        }  
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
            $admin_account_update = AdminAccount::find($id);
            $admin_account_update->update([
                'balance' => $request->balance,
                'wallet_address' => $request->wallet_address,
            ]);
            Session::flash('success', 'Admin Account  Has Been Updated Successfully!');
            return back();
        }
        catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
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
            $admin_account = AdminAccount::find($id);
            $admin_account->delete();
            Session::flash('error', 'Admin Account Has Been Deleted Successfully!');
            return back();
        }
        catch (\Exception $e) {
            Session::flash('error',   $e->getMessage());
            return redirect()->back();
        }
    }
}
