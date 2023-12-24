<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $userRole = Role::where('name', 'user')->first();
        $users = User::with('userdetails','roles')->get();
        return view('user.index',compact('users'));
    }    
    /**
     * create
     *
     * @return void
     */
    public function create(){
        $roles = Role::get();
        return view('user.create',compact('roles'));
    }
    public function edit($id){
        $roles = Role::get();
        $user = User::with('userdetails','roles')->find($id);
        if ($user != null) {
        return view('user.edit',compact('user','roles'));
        }
        else{
            Session::flash('error', 'User has not found.');
            return redirect()->route('users.index');
        }
    }
    public function update(Request $request,$id){
        $user_update=User::find($id);
        $user_update->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'status' => $request->status,
        ]);
        $user_profile = UserDetail::where('user_id',$id)->first();
        if($user_profile != null){
            $user_profile->update([
                "username" => $request->user_name,
                "phone_number" => $request->phone_number,
            ]);
        }
        if($user_profile == null){
            $user_profile = new UserDetail(); 
            $user_profile->user_id = $id;
            $user_profile->username = $request->user_name;
            $user_profile->phone_number = $request->phone_number;
            $user_profile->address_1 = $request->address_1;
            $user_profile->address_2 = $request->address_2;
            $user_profile->postal_code = $request->postal_code;
            $user_profile->state = $request->state;
            $user_profile->city = $request->city;
            $user_profile->country = $request->country;
            $user_profile->save();
        }
        $user_update->syncRoles($request->role);
        Session::flash('success', 'User  Has Been Updated Successfully!');
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        $userDetail = UserDetail::where('user_id',$id);
        if(isset($userDetail))
            {
                $userDetail->delete();
            }
        $user=User::find($id);
        $user->delete();
        Session::flash('error', 'User  Has Been Deleted Successfully!');
        return back();
    }
    public function userprofile_edit($id){
        $user_profile=User::with('userdetails')->find($id);
        return view('user-profile.update',compact('user_profile'));
    }
    public function userprofile_update(Request $request,$id)
    {
        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
          
        ];
        $user_update = User::findOrFail($id);
           // Check if a new password is provided
        if (!is_null($request->password)) {
            $userData['password'] = Hash::make($request->password);
        }
        $user_update->update($userData);
        $user_profile = UserDetail::where('user_id', $id)->first();
        if ($user_profile) {
            $user_profile->update([
                'phone_number' => $request->phone_number,
            ]);
        }
        else {
            UserDetail::create([
                'user_id' => $id,
                'phone_number' => $request->phone_number,
            ]);
        }
        if ($request->hasFile('avatar')) {
           // If an old avatar exists, delete it
           if (isset($user_profile->avatar) || File::exists(public_path($user_profile->avatar))) {
               File::delete(public_path($user_profile->avatar));
           }
           $image = $request->file('avatar');
           $name = $image->getClientOriginalName();
           $path = public_path('images/userprofile');
           $image->move($path, $name);
           $user_profile->avatar = "images/userprofile/{$name}";
           $user_profile->save();
       }
       return redirect(route('home'));
    }

}
