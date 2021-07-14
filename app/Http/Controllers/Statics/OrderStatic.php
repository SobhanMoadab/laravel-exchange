<?php


namespace App\Http\Controllers\Statics;

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\PriceServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class OrderStatic extends Controller
{

    public function register_order_form()
    {
         $result =  Http::get('https://api.coinstats.app/public/v1/coins'); 
         foreach($result['coins'] as $coin){
             return $coin['id'];
         }
        return view('Client.Wizard');
    }
    public function register_order(Request $request)
    {
    }
}
