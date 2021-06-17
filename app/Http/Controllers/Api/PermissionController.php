<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //this control : 
    // 1. handles mass assigning permissions to users
    // 2. Permissions are customizable
    // 3. can make sub admins with custom privileges


    public function get_all_roles()
    {
        // fetch all roles
        $user = Auth::user();
        $user->with('roles')->first();
        return response()->json(['a'=>$user->roles]);

        $roles = Role::get();
        return response()->json(['msg' => 'Success', 'roles' => $roles, 200]);
    }
    public function create_role(Request $request)
    {
        // for super Admin only
        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'name is required'
        ]);
        try {
            $role = Role::create(['name' => $validated['name']]);
            return response()->json(['msg' => 'success', 'role' => $role, 200]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
    public function create_permission(Request $request){

        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'name is required'
        ]);
        try {
             $role = Role::findByName('SuperAdmin');
             $role->givePermissionTo('post a post');
            return response()->json(['msg' => 'sucess'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
    public function create_subadmin(Request $request)
    {
        // done by super admin and admin
        // created subadmin even with same permissions as admin CAN NOT DELETE admins or superAdmin
        // has custom privileges

        $validated = $request->validate(['user_id' => 'required'], ['user_id.required' => 'user_id is required']);
        try {
            $user_id = $validated['user_id'];
            $user =  User::find($user_id);
            if($user->hasRole('Admin') || $user->Role('SuperAdmin')){
            return response()->json(['msg' => 'User is already an Admin'],400);
            }

            $user->syncRoles('SubAdmin');
            $user_resource = new UserResource($user);

            return response()->json(['msg' => 'Role assigned to user', 'user' => $user_resource],200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
}
