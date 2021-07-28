<?php

declare(strict_types=1);

namespace App\Http\Controllers\Statics\Admin;

use App\Http\Controllers\Core\Services\AuthenticationServices;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthStatic extends Controller
{
    public function register_form()
    {

        $data = [
            'countries' => Country::all()
        ];
        return view('Admin.auth.register', $data);
    }
    public function register(AuthenticationServices $auth, Request $request)
    {
        $result = $auth->register($request);
        return redirect('/');
    }
    public function login_form()
    {
        return view('Admin.auth.login');
    }
    public function login(AuthenticationServices $auth, Request $request)
    {
        $result = $auth->login($request);
        if ($result['error']) {
            return redirect()->back()->with('error', $result['error']);
        }
        return redirect('/')->with('success', 'SUCCESS');
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
