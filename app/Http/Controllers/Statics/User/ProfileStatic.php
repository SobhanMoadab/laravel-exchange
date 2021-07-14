<?php


namespace App\Http\Controllers\Statics\User;

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\PriceServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class ProfileStatic extends Controller
{

    public function index(){
        $response = Http::withHeaders([
            'X-CSCAPI-KEY' => env('COUNTRY_API_KEY'),
        ])->get('https://api.countrystatecity.in/v1/countries');
        $response = strval($response->getBody());
        $response = json_decode($response, true);
        $data=[
            'countries' => $response
        ];
        return view('User.Verification', $data);
    }
}