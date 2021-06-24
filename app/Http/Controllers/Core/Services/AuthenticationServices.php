<?php

namespace App\Http\Controllers\Core\Services;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;

class AuthenticationServices
{
    public function register($request) 
    {
        $validated = $request->validate([
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:6|confirmed',
                    'country_id' => 'required'
        
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
                return response()->json(['msg' => 'Invalid Credentials'],403);
            }
            $token = auth()->user()->createToken('authToken')->accessToken;
            return [$token];
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
}