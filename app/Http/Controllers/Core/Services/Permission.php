<?php

namespace App\Http\Controllers\Core\Services;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class Permission
{
    
    // 1. handles mass assigning permissions to users
    // 2. Permissions are customizable
    // 3. can make sub admins with custom privileges
    // 4. returns: [$foo]

    public function get_all_roles()
    {
        // fetch all roles
        $user = Auth::user();
        $user->with('roles')->first();
        return response()->json(['a' => $user->roles]);

        $roles = Role::get();
        return [$roles];
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
            return [$role];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
}