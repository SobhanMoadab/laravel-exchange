<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $role = Auth::user()->getAllPermissions()->pluck('name');
        if (strpos($role, $permission) >= 0) {
            return $next($request);
        }
        return response()->json(['msg' => 'you are not authorized'], 403);

    
    }
}
