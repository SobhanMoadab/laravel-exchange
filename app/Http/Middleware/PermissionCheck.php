<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $role = Auth::user()->roles->pluck('name');
        $userPermission = Auth::user()->getPermissionsViaRoles();

        if ($userPermission != $permission) {
            return response()->json(['a' => $userPermission, 'b'=> $permission]);

        } else {
            return redirect(route('login'));
        }
    }
}
