<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Mail\VerifyUser;
use App\Models\Order;
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
        ], [
            'currency_id' => 'required',
            'user_id' => 'required',
            'order_status' => 'required',
        ]);
        if (Auth::check()) {
            $order = Order::create([
                'currency_id' => $request->currency_id,
                'invoice_id' => $request->invoice_id,
                'user_id' => Auth::id(),
            ]);
            return view('User.Payment.');
        }
        $order = Order::create([
            'currency_id' => $request->currency_id,
            'invoice_id' => $request->invoice_id,
            'order_status' => $request->order_status,
        ]);

        //    return view('User.Verification.Email');
    }
    public function register_order_form()
    {
        return view('User.Order.index');
    }

    public function verify_email(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ], [
            'email.required' => 'ایمیل خالی است'
        ]);
        $to_email = $request->email;
        $verificationCode = random_int(1000, 9999);
        $data = array('name'=> $request->email,'body' => $verificationCode);
        Mail::send('User.Mail.verify', $data, function($message) use ($to_email) {
            $message->to($to_email)
            ->subject('Verify Your Email');
            $message->from('SENDER_EMAIL_ADDRESS','Test Mail');
            });

        return redirect()->back()->with('success', 'کد تایید ارسال شد');
    }
}
