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
        return response()->json(['a' => $user->roles]);

        $roles = Role::get();
        return response()->json(['msg' => 'Success', 'roles' => $roles],200);
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
            $role = Role::create(['guard_name' => 'api', 'name' => $validated['name']]);
            return response()->json(['msg' => 'success', 'role' => $role],200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
    public function create_permission(Request $request)
    {
        // create a permission to be checked by middleware,
        //assignable to role
        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'name is required'
        ]);
        try {
            $permission = Permission::create(['guard_name' => 'api', 'name' => $validated['name']]);
            return response()->json(['msg' => 'success', 'permission' => $permission], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    public function assign_permission_to_role(Request $request)
    {
        // you need to create permission first to assign it to a role

        $validated = $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ], [
            'name.required' => 'name is required',
            'permission.required' => 'permission is required',
        ]);
        try {
            $role = Role::findByName($request->name, 'api');
            $permission = Permission::findByName($request->permission, 'api');

            if (!$role || !$permission) {
                return response()->json(['msg' => 'requested role or permission does not existsts'], 400);
            }
            $role->givePermissionTo($request->permission);
            return response()->json(['msg' => $request->permission . ' assigned to ' . $request->name], 200);
        } catch (\Exception $e) {
          return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    public function revoke_permission_of_role(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ], [
            'name.required' => 'name is required',
            'permission.required' => 'permission is required',
        ]);

        try {
            $role = Role::findByName($request->name, 'api');
            $permission = Permission::findByName($request->permission, 'api');

            if (!$role || !$permission) {
                return response()->json(['msg' => 'requested role or permission does not exists'], 400);
            }
            $role->revokePermissionTo('edit articles');
            return response()->json(['msg' => 'permission revoked'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    public function create_sub_admin(Request $request)
    {
        // done by super admin and admin
        // created subadmin even with permissions as admin /CAN NOT DELETE admins or superAdmin


        // 1 give permissions to array of users
        // 2 assign role of sub-admin
        
        $validated = $request->validate([
            'user_id' => 'required',
            'permission' => 'required'
        ], [
            'user_id.required' => 'cant be empty',
            'permission.required' => 'cant be empty'
        ]);

        try {
            $role =  Role::findOrCreate('admin','api');
            $permission = Permission::findOrCreate($request->permission, 'api');
            $user = User::findOrFail($request->user_id);
            if(!$user->hasRole('admin')){
                $user->assignRole('admin');
            }
            $user->givePermissionTo($request->permission);
            return response()->json(['msg' =>  "user can '$request->permission' "],200);
            
           
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }


















        $validated = $request->validate(['user_id' => 'required', 'permission' => 'required'], ['user_id.required' => 'user_id is required', 'permission.required' => 'permission is required']);

        try {
            $user_id = $validated['user_id'];
            $user =  User::findOrFail($user_id);
            if ($user->hasRole('Admin') || $user->Role('SuperAdmin')) {
                return response()->json(['msg' => 'User is already an Admin'], 400);
            }

            $user->syncRoles('SubAdmin');
            $user_resource = new UserResource($user);

            return response()->json(['msg' => 'Role assigned to user', 'user' => $user_resource], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    //to do
    //create function to assign role to user
    public function assign_role_to_user(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                ''
            ], []);
        } catch (\Exception $e) {
        }
    }
}
