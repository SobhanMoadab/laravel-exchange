<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Events\VerifyEmailOrder;
use App\Http\Resources\UserResource;
use App\Models\Log;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            $verificationCode = random_int(1000, 9999);
            $verificationInfo = Verification::updateOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'code' => $verificationCode,
                ]
            );
            // VerifyEmailOrder::dispatch($validated['email'], $verificationCode);
            Mail::send('User.Mail.verify', ['body' => $verificationCode], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Verify Your Email');
                $message->from('veiledassassin99@gmail.com', 'E-CMS');
            });

            Log::create(['action' => ' ساخت حساب کاربری', 'user_id' => $user->id, 'is_admin' => false]);
            Auth::login($user);
            return ['msg' => 'success', 'result' => [$user]];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
    public function verify_order_email($request)
    {
        $validated = $request->validate([
            'code' => 'required'
        ], [
            'code.required' => 'code is required'
        ]);
        try {
            $verification_code = Verification::where('code', $validated['code'])->first();
            if (!$verification_code) {
                return ['error' => 'code is wrong'];
            }
            $verification_code->delete();
            return ['msg' => 'success'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
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
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return ['error' => 'Wrong Credentials'];
            }
            $hash_check = Hash::check($request->password, $user->password);
            if (!$hash_check) {
                return ['error' => 'Wrong Credentials'];
            }
            if (!$request->remember) {
                Auth::login($user);
            }
            Auth::login($user, true);
            // $token = auth()->user()->createToken('authToken')->accessToken;
            Log::create(['action' => ' ورود به حساب کاربری', 'user_id' => Auth::id(), 'is_admin' => false,]);
            return ['msg' => 'success', 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
