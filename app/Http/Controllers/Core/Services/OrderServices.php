<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Mail\VerifyUser;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Binance;
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
        if (Auth::check()) {
            $order = Order::create([
                'currency_id' => $request->currency_id,
                'user_id' => Auth::id(),
                'amount' => $request->amount
            ]);
            return view('User.Payment');
        }
        $order = Order::create([
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
        ]);
        $request->session()->put('order', $order);
            return view('');
        //    return view('User.Verification.Email');
    }
    public function register_order_form()
    {
        return view('User.order.index');
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
            return redirect()->back()->with('success', 'کد تایید ارسال شد');
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
    public function verify_code(Request $request)
    {
        try{
            $request->validate(['code' => 'required'], ['code.required' => 'کد تایید خالی است']);
            $data = $request->session()->get('data');
            if ($request->code == $data['verification_code']) {
                return view('User.choose_password', $data);
            } else {
                return ['msg', 'کد تایید اشتباه است '];
            }
        }catch(\Exception $e){
            return ['msg' => $e->getMessage()];
        }
      
    }
    public function choose_password(Request $request){
        $request->validate([
            'country_id' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ],[
            'country_id.required' => 'country_id is required',
            'password.required' => 'password is required',
            'password_confirmation.required' => 'password_confirmation is required',
        ]);
        try{
            $data = $request->session()->get('data');
            User::create([
                'email' => $data['email'],
                'password' => bcrypt($request->password),
                'country_id' => $request->country_id
            ]);
            $request->session()->flush();
            return redirect(('/'));
        }catch(\Exception $e){
            return ['msg' => $e->getMessage()];
        }
      
    }
}
