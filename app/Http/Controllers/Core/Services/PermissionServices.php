<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

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
            $roles = Role::all()->pluck('name');

            return ['roles' => $roles];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
    public function get_all_permissions($request)
    {
        try {
            $permissions = Permission::all()->pluck('name');
            return ['permissions' => $permissions];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }

    public function create_role($request)
    {
        // for super Admin only
        $validated = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'name is required',
        ]);
        try {
            $role = Role::create(['guard_name' => 'api', 'name' => $validated['name']]);
            return [$role];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
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
            if (! $role || ! $permission) {
                return response()->json(['msg' => 'requested role or permission does not existsts'], 400);
            }
            $role->givePermissionTo($request->permission);
            return ['msg' => 'success'];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage(), 'e' => $e];
        }
    }
}
