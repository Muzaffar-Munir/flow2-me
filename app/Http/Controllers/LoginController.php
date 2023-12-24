<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\UserDetail;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function user_login()
    {
        return view('auth.user_login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function  user_login_index(Request $request){

        $user = User::with('userdetails')->where('email', $request->email)->first();

        if ($user){
                $role = $user->roles->pluck('name');
                if(!$role->isEmpty()){
                    if ($role[0]=='user') {
                        // $userDetail = UserDetail::where('user_id',$user->id)->first();
                        // $data = [];
                        $data['id'] = $user->id;
                        $data['last_name'] = $user->last_name;
                        $data['email'] = $user->email;
                        $data['token'] = $user->token;
                        $data['status'] = $user->status;
                        $data['created_at'] = $user->created_at;
                        $data['updated_at'] = $user->updated_at;
                        // $data['username'] = $userDetail->username;


                        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                            // $token =  Auth::user()->createToken('flowers')->accessToken;
                            $success = [
                                'success' => true,
                                'status' => 200,
                                'user' => $data,
                                // 'token_key' => $token,
                            ];

                           return redirect('/user-home');
                        }
                        else
                        {
                            Session::flash('error', 'Oops, Your email address or password is incorrect!.');
                            return redirect(route('user_login'));
                        }
                    }
                    else{
                        Session::flash('error', 'Oops, You have not right role!.');
                        return redirect(route('user_login'));
                    }
                }
                else{

                    Session::flash('error', 'Oops, You have not any role!.');
                    return redirect(route('user_login'));
                }

        }
        else
        {
            Session::flash('error', 'Oops, Your email address or password is incorrect!.');
            return redirect(route('user_login'));
        }

    }
    public function  login_index(Request $request){

        $user = User::with('userdetails')->where('email', $request->email)->first();

        if ($user){
                $role = $user->roles->pluck('name');
                if(!$role->isEmpty()){
                    if ($role[0]=='admin') {
                        $userDetail = UserDetail::where('user_id',$user->id)->first();
                        $data = [];
                        $data['id'] = $user->id;
                        $data['last_name'] = $user->last_name;
                        $data['email'] = $user->email;
                        $data['token'] = $user->token;
                        $data['status'] = $user->status;
                        $data['created_at'] = $user->created_at;
                        $data['updated_at'] = $user->updated_at;
                        // $data['username'] = $userDetail->username;

                        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                            // $token =  Auth::user()->createToken('flowers')->accessToken;
                            $success = [
                                'success' => true,
                                'status' => 200,
                                'user' => $data,
                                // 'token_key' => $token,
                            ];
                            // dd($success);
                             return view('welcome');

                        //    return redirect('/home');
                        }
                        else
                        {
                            Session::flash('error', 'Oops, Your email address or password is incorrect!.');
                            return redirect(route('admin-login'));
                        }
                    }

                    else{
                        Session::flash('error', 'Oops, You have not right role!.');
                        return redirect(route('admin-login'));
                    }
            }
            else{
                Session::flash('error', 'Oops, you are not has right role!.');
                return redirect(route('admin-login'));
            }

        }
        else
        {
            Session::flash('error', 'Oops, Your email address or password is incorrect!.');
            return redirect(route('admin-login'));
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
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
