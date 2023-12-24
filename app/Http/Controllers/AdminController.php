<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionName;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function role_create(){
        $roles = Role::with('users','permissions')->get();
        $permissions =Permission::get();
        return view('manage-admin.role.index',compact('roles','permissions'));
    }

    public function role_store(Request $request){
        $request->validate([
            'role_name' => 'required',
        ]);
        Role::create([
            'name' => $request->role_name,
            'guard_name' => 'web',
        ]);
        Session::flash('success','New Role has been created successfully.');
        return back();
    }

    public function role_update(Request $request,$id){
    $role = Role::find($id);
    if (!$role) {
        return back()->with('error', 'Invalid Role selected.');
    }

    // Get the selected permission IDs from the request
    $selectedPermissionIds = $request->input('permissions', []); // Provide an empty array as default value

    // Assign the new permissions
    $newPermissions = Permission::whereIn('id', $selectedPermissionIds)->get();
    $role->syncPermissions($newPermissions);
    return back()->with('success', 'Permissions assigned to role successfully.');

    }
    public function roles_delete($id){
        $role_delete=Role::with('permissions')->find($id);
        $role_delete->delete();
        Session::flash('error','Role has been deleted successfully.');
        return back();
    }

//permission section

    public function permission_index(){
        $permissions = Permission::get();
        $roles=Role::get();
        return view('manage-admin.permission.index',compact('permissions','roles'));

    }
    public function permission_store(Request $request){
        try{
            $request->validate([
                'permission_name' => 'required',
            ]);
            Permission::create([
                'name' => $request->permission_name,
                'guard_name' => 'web',
            ]);
            Session::flash('success','Your permission has been saved successfully.');
            return back();
        }
        catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }

    }
    public function permission_update(Request $request,$id){

        try{
            $request->validate([
                'permission_name' => 'required',
            ]);
            $permission_update=Permission::find($id);
            $permission_update->update([
                'name' => $request->permission_name,
                'guard_name' => 'web',
            ]);
            Session::flash('success','Permission has been update successfuly.');
            return back();
        }
        catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }
    public function permission_delete($id){
        try{
            $permission_delete=Permission::find($id);
            $permission_delete->delete();
            Session::flash('error','Permission has been delete successfully.');
            return back();
        }
        catch (\Exception $e) {
            Session::flash('error',  $e->getMessage());
            return redirect()->back();
        }
    }
    public function permission_assign_role(Request $request){
        $role=Role::find($request->role_id);
        // dd($role);
    }


    

}
