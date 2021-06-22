<?php

namespace App\Http\Controllers\Core;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
  public function register_order(Request $request){

      $request->validate([
        'currency_id' => 'required',
        'user_id' => 'required',
        'invoice_id' => 'required',
        'order_status' => 'required',
      ],[
        'currency_id' => 'required',
        'user_id' => 'required',
        'invoice_id' => 'required',
        'order_status' => 'required',
      ]);
        $order = Order::create([
            'currency_id' => '',
            'user_id' => Auth::id(),
            
        ]);
        
  }
}
