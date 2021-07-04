<?php


namespace App\Http\Controllers\Statics;

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\PriceServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderStatic extends Controller
{

    public function register_order_form()
    {
        return view('Client.Wizard');
    }
    public function register_order(Request $request)
    {
    }
}
