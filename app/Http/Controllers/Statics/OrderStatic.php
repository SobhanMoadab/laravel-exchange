<?php


namespace App\Http\Controllers\Statics;

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\PriceServices;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class OrderStatic extends Controller
{

    public function register_order_form()
    {
        $data = [
            'Currencies' => Currency::all()
        ];
        return view('Client.Wizard', $data);
    }
    public function register_order(Request $request)
    {
    }
}
