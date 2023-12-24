<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\AdminforgotPasswordMail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetpassword');
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

    public function submitForgetPasswordForm(Request $request){
        $token = rand(60000, 600000);
        $user = DB::table('users')->where(['email' => $request->email])->first();

        if ($user) {
            // Check if there's an existing reset token for the user's email
            $existingReset = DB::table('password_resets')->where(['email' => $request->email])->first();

            if ($existingReset) {
                // Update the existing token
                DB::table('password_resets')->where(['email' => $request->email])->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            } else {
                // Insert a new token
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            }

            $data = DB::table('password_resets')->where(['email' => $request->email, 'token' => $token])->first();
            Mail::to($data->email)->send(new AdminforgotPasswordMail($data));
            Session::flash('success', 'Email Has Been Sent Successfully!');
            return redirect(route('login'));
        } else {
            return back()->with('error', 'No Email Found For This Record');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showResetPasswordForm($token)
    {
      $data = DB::table('password_resets')->where(['token' => $token ])->first();
      return view('auth.resetPasswordLink',['data'=>$data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);
        $currentToken = DB::table('password_resets') ->where([
            'email' => $request->email,
            'token' => $request->token ])->first();
        if($currentToken){
            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
            // logic for update password
            Session::flash('success', 'Your password has been changed!');
            return redirect()->route('login');
            //
        } else {
            return back()->withInput()->with('error', 'Invalid token!');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
