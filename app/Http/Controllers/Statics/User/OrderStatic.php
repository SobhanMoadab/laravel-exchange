<?php


namespace App\Http\Controllers\Statics\User;

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\OrderServices;
use App\Http\Controllers\Core\Services\PriceServices;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class OrderStatic extends Controller
{
    public function register_order_form()
    {
        $data = [
            'currencies' => Currency::all(),
            'countries' => Country::all()
        ];
        return view('Client.Wizard', $data);
    }
    public function register_order(Request $request, OrderServices $order)
    {
        $result = $order->register_order($request);
        if ($result['error']) {
            return redirect()->back()->with('error', $result['error']);
        }
        return $result;
        
        //    return view
    }
}
