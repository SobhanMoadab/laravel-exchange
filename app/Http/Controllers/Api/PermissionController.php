<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Core\Services\PermissionServices;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //this control :
    // 1. handles mass assigning permissions to users
    // 2. Permissions are customizable
    // 3. can make sub admins with custom privileges

    public function get_all_roles(Request $request, PermissionServices $permission)
    {
        // fetch all roles
        $result = $permission->get_all_roles($request);
        return response()->json(['msg' => 'success', 'result' => $result], 200);
    }
    public function create_role(Request $request, PermissionServices $permission)
    {
        // for super Admin only
        $result = $permission->create_role($request);
        return response()->json(['msg' => 'success', 'result' => $result], 200);
    }
    public function create_permission(Request $request, PermissionServices $permission)
    {
        $result = $permission->create_permission($request);
        if ($result['e'] instanceof \Exception) {
            return response()->json([$result['msg']], $result['e']->getCode());
        }
        return response()->json(['msg' => 'success', 'result' => $result], 200);
    }
    public function assign_permission_to_role(Request $request, PermissionServices $permission): void
    {
        // you need to create permission first to assign it to a role
    }
    public function revoke_permission_of_role(Request $request, PermissionServices $permission)
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

            if (! $role || ! $permission) {
                return response()->json(['msg' => 'requested role or permission does not exists'], 400);
            }
            $role->revokePermissionTo('edit articles');
            return response()->json(['msg' => 'permission revoked'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    public function create_sub_admin(Request $request, PermissionServices $permission)
    {
        // done by super admin and admin
        // created subadmin even with permissions as admin /CAN NOT DELETE admins or superAdmin

        // 1 give permissions to array of users
        // 2 assign role of sub-admin

        $validated = $request->validate([
            'user_id' => 'required',
            'permission' => 'required',
        ], [
            'user_id.required' => 'cant be empty',
            'permission.required' => 'cant be empty',
        ]);

        try {
            $role = Role::findOrCreate('admin', 'api');
            $permission = Permission::findOrCreate($request->permission, 'api');
            $user = User::findOrFail($request->user_id);
            if (! $user->hasRole('admin')) {
                $user->assignRole('admin');
            }
            $user->givePermissionTo($request->permission);
            return response()->json(['msg' => "user can '{$request->permission}' "], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }

        $validated = $request->validate(['user_id' => 'required', 'permission' => 'required'], ['user_id.required' => 'user_id is required', 'permission.required' => 'permission is required']);

        try {
            $user_id = $validated['user_id'];
            $user = User::findOrFail($user_id);
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
    public function assign_role_to_user(Request $request): void
    {
        try {
            $request->validate([
                'user_id' => 'required',
                '',
            ], []);
        } catch (\Exception $e) {
        }
    }
}
