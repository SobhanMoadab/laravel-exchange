<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

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
        $role = Auth::user()->getAllPermissions()->pluck('name');
        if (strpos($role, $permission) >= 0) {
            return $next($request);
        } else {
            return response()->json(['msg' => 'you are not authorized'], 403);
        }
    }
}
