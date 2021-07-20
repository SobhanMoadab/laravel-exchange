<?php


namespace App\Http\Controllers\Statics\Admin;

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
        $response = Http::withHeaders([
            'X-CSCAPI-KEY' => env('COUNTRY_API_KEY'),
        ])->get('https://api.countrystatecity.in/v1/countries');
        $response = strval($response->getBody());
        $response = json_decode($response, true);
        $data = [
            'Currencies' => Currency::all(),
            'countries' =>$response
        ];
        return view('Client.Wizard', $data);
    }
    public function register_order(Request $request)
    {
    }
}
