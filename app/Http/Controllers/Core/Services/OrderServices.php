<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Events\VerifyEmailOrder;
use App\Mail\VerifyUser;
use App\Models\Currency;
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
            'currency_name' => 'required',
            'amount' => 'required',
        ], [
            'currency_name.required' => 'choose your currency',
            'amount.required' => 'amount is required',

        ]);
        try {
            $currency = Currency::where('name', $request->currency_name)->first();
            if (Auth::check()) {
                $order = Order::create([
                    'currency_id' => $currency->id,
                    'user_id' => Auth::id(),
                    'order_status' => 'pending_confirmation',
                    'amount' => $request->amount
                ]);
                Log::create(['action' => 'مرحله اولیه ثبت سفارش ', 'user_id' => Auth::id(), 'is_admin' => false]);
                // return view('User.Payment');
                $request->session()->put('order', $order);
                return ['order' => $order, 'error' => null];
            }
            $order = Order::create([
                'currency_id' => $request->currency_id,
                'amount' => $request->amount,
                'order_status' => 'pending_confirmation',

            ]);
            $request->session()->put('order', $order);
            Log::create(['action' => 'مرحله اولیه ثبت سفارش ', 'user_id' => Auth::id(), 'is_admin' => false]);
            // return view('');
            return ['order' => $order, 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function register_order_form()
    {

        return view('Client.Wizard');
    }
    public function verify_order_form(){

    }

    public function verify_order(){
        
    }
}
