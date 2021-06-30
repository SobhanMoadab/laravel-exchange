<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticationServices
{
    public function register($request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'country_id' => 'required',

        ], [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
            'country_id.required' => 'country is required',

        ]);
        try {
            $validated['password'] = bcrypt($request->password);
            $user = User::create($validated);
            $token = $user->createToken('authToken')->accessToken;
            $user_resource = new UserResource($user);
            Log::create(['action' => ' ساخت حساب کاربری', 'user_id' => $user->id, 'is_admin' => false]);
            return [$user_resource];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }

    public function login($request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
        ]);
        try {
            if (!auth()->attempt($validated)) {
                return ['error' => 'اطلاعات نادرست می باشید'];
            }
            $token = auth()->user()->createToken('authToken')->accessToken;
            Log::create(['action' => ' ساخت حساب کاربری', 'user_id' => Auth::id(), 'is_admin' => false]);
            return [$token];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
