<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Mail\VerifyUser;
use App\Models\Log;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Binance;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class OrderServices
{
    public function register_order(Request $request)
    {
        $request->validate([
            'currency_id' => 'required',
            'user_id' => 'required',
            'order_status' => 'required',
            'amount' => 'required'
        ], [
            'currency_id' => 'required',
            'user_id' => 'required',
            'order_status' => 'required',
        ]);
        try {
            if (Auth::check()) {
                $order = Order::create([
                    'currency_id' => $request->currency_id,
                    'user_id' => Auth::id(),
                    'amount' => $request->amount
                ]);
                Log::create(['action' => 'مرحله اولیه ثبت سفارش ', 'user_id' => Auth::id(), 'is_admin' => false]);
                return $order;
                return view('User.Payment');
            }
            $order = Order::create([
                'currency_id' => $request->currency_id,
                'amount' => $request->amount,
            ]);
            $request->session()->put('order', $order);
            Log::create(['action' => 'مرحله اولیه ثبت سفارش ', 'user_id' => Auth::id(), 'is_admin' => false]);
            return view('');
            //    return view('User.Verification.Email');
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function register_order_form()
    {

        return view('Client.Wizard');
    }

    public function verify_email(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ], [
            'email.required' => 'ایمیل خالی است'
        ]);
        try {
            $to_email = $request->email;
            $verificationCode = random_int(1000, 9999);
            $data = ['body' => $verificationCode];
            Mail::send('User.Mail.verify', $data, function ($message) use ($to_email) {
                $message->to($to_email)
                    ->subject('Verify Your Email');
                $message->from('veiledassassin99@gmail.com', 'E-CMS');
            });
            $data = [
                'verification_code' => $verificationCode,
                'email' => $request->email,
            ];
            $request->session()->put('data', $data);
            // $is_admin = Auth::user()->hasRole(['admin', 'super-admin', 'sub-admin']) ? true : false;
            return ['msg', 'کد تایید ارسال شد'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function verify_code(Request $request)
    {
        try {
            $request->validate(['code' => 'required'], ['code.required' => 'کد تایید خالی است']);
            $data = $request->session()->get('data');
            if ($request->code == $data['verification_code']) {
                Log::create(['action' => 'تایید ایمیل', 'user_id' => Auth::id(), 'is_admin' => false]);

                return view('User.choose_password', $data);
            } else {
                return ['msg', 'کد تایید اشتباه است '];
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function choose_password(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ], [
            'country_id.required' => 'country_id is required',
            'password.required' => 'password is required',
            'password_confirmation.required' => 'password_confirmation is required',
        ]);
        try {
            $data = $request->session()->get('data');
            User::create([
                'email' => $data['email'],
                'password' => bcrypt($request->password),
                'country_id' => $request->country_id
            ]);
            $request->session()->flush();
            Log::create(['action' => 'تایید رمز عبور', 'user_id' => Auth::id(), 'is_admin' => false]);
            return redirect(('/'));
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
