<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function register_form()
    // {
    //     return view('');
    // }

    public function register(Request $request)
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
        // return response()->json(['test'=>$request->all()]);
        try {
            $validated['password'] = bcrypt($request->password);
            $user = User::create($validated);
            $token = $user->createToken('authToken')->accessToken;
            $user_resource = new UserResource($user);
            return response()->json(['user' => $user_resource, 'token' => $token], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
    public function login(Request $request)
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
                return response()->json(['msg' => 'Invalid Credentials', 403]);
            }
            $token = auth()->user()->createToken('authToken')->accessToken;
            return response()->json(['msg'=>'Logged In', 'token'=> $token, 200]);

        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 500]);

        }
        
    }
}
