<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionServices
{
    // 1. handles mass assigning permissions to users
    // 2. Permissions are customizable
    // 3. can make sub admins with custom privileges
    // 4. returns: [$foo]

    public function get_all_roles($request)
    {
        // fetch all roles
        try {
            $roles = Role::with('permissions')->get()->pluck('name');
            // $permissions = Permission::all()->pluck('name');
            Log::create(['action' => 'دریافت سطح ها (role) ', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['roles' => $roles];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
   
    public function create_role($request)
    {
        // for super Admin only
        $validated = $request->validate([
            'role_name' => 'required',
            'permissions' => 'required'
        ], [
            'role_name.required' => 'role_name is required',
            'permissions.required' => 'permissions is required',
        ]);
        try {
            $role = Role::create(['guard_name' => 'web', 'name' => $validated['role_name']]);
            foreach($request->permissions as $key=>$permission){
                $role->givePermissionTo($permission);
            }
            Log::create(['action' => "$request->role_name:ایجاد سطح", 'user_id' => Auth::id(), 'is_admin' => true]);
            Log::create(['action' => "$request->permission : دارای دسترسی های  $role->name سطح", 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['role' => $role, 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function create_permission($request)
    {
        // create a permission to be checked by middleware,
        //assignable to role
        if ($data = $request->json()->all()) {
            return $data;
        }
        $validated = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'name is required',
        ]);
        try {
            $permission = Permission::create(['guard_name' => 'api', 'name' => $validated['name']]);
            Log::create(['action' => "$request->name :ایجاد دسترسی", 'user_id' => Auth::id(), 'is_admin' => true]);
            return [$permission];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage(), 'e' => $e];
        }
    }
    public function assign_permission_to_role($request)
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
                return ['error' => 'requested role or permission does not existsts'];
            }
            $role->givePermissionTo($request->permission);
            Log::create(['action' => " ($request->name) به سطح  ($request->permission) دسترسی", 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'success'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage(), 'e' => $e];
        }
    }
}
