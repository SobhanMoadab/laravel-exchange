<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function register_order(Request $request)
    {
        $request->validate([
          'currency_id' => 'required',
          'user_id' => 'required',
          'invoice_id' => 'required',
          'order_status' => 'required',
      ], [
          'currency_id' => 'required',
          'user_id' => 'required',
          'invoice_id' => 'required',
          'order_status' => 'required',
      ]);
        if (Auth::check()) {
            $order = Order::create([
            'currency_id' => $request->currency_id,
            'invoice_id' => $request->invoice_id,
            'order_status' => $request->order_status,
            'data' => $request->data,
            'user_id' => Auth::id(),
        ]);
            return response()->json(['msg' => 'successfully submitted order', 'order' => $order], 200);
        }
        $order = Order::create([
            'currency_id' => $request->currency_id,
            'invoice_id' => $request->invoice_id,
            'order_status' => $request->order_status,
            'data' => $request->data,
        ]);
        // session()

  
    }
}
