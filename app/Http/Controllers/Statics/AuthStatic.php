<?php

declare(strict_types=1);

namespace App\Http\Controllers\Statics;

use App\Http\Controllers\Core\Services\AuthenticationServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthStatic extends Controller
{
    public function register_form()
    {
        $response = Http::withHeaders([
            'X-CSCAPI-KEY' => env('COUNTRY_API_KEY'),
        ])->get('https://api.countrystatecity.in/v1/countries');
        $response = strval($response->getBody());
        $response = json_decode($response, true);
        $data = [
            'countries' => $response
        ];
        return view('auth.register', $data);
    }
    public function register(AuthenticationServices $auth, Request $request)
    {
        $result = $auth->register($request);
        return redirect('/');
    }
    public function login_form()
    {
        return view('auth.login');
    }
    public function login(AuthenticationServices $auth, Request $request)
    {
        $result = $auth->login($request);
        if($result['error']){
            return redirect()->back()->with('error', 'something is wrong');
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
