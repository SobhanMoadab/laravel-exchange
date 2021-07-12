<?php

namespace App\Http\Controllers\Statics;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Core\Services\PermissionServices;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionStatic extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-permission');
        // $this->middleware('permission:create-permission', ['only' => ['create_role_form', 'create_role']]);
        // $this->middleware('permission:update-permission', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
    }

    public function get_all_roles_form(PermissionServices $permission, Request $request)
    {
        $roles = Role::all();
        return view('Admin.Roles.index', ['roles' => $roles]);
    }

    public function create_role_form(PermissionServices $permission, Request $request)
    {
        $permissions = Permission::all();
        return view('Admin.Roles.create', ['permissions' => $permissions]);
    }

    public function create_role(PermissionServices $permission, Request $request)
    {
        $result = $permission->create_role($request);
        if ($result['error']) {
            return redirect()->back()->with('error', $result['error']);
        }

        return redirect()->back()->with('success', 'با موفقیت انجام شد');
    }
    public function create_permission_form(PermissionServices $permission, Request $request)
    {
        $result = Permission::all();
        return view('Admin.Roles.index', $result);
    }
    public function create_permission(PermissionServices $permission, Request $request)
    {
        $result = $permission->create_permission($request);
        return redirect()->back()->with('success', 'با موفقیت انجام شد');
    }

    public function assign_permission_to_role(PermissionServices $permission, Request $request)
    {

        $result = $permission->assign_permission_to_role($request);
        return redirect()->back()->with('success', 'با موفقیت انجام شد');
    }
}
