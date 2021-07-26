<?php


namespace App\Http\Controllers\Statics\Admin;

use App\Events\PriceList;
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
            'Currencies' => Currency::all(),
            'countries' =>Country::all()
        ];
        return view('Client.Wizard', $data);
    }
    public function register_order(Request $request)
    {
        return $request->all();
    }
}
