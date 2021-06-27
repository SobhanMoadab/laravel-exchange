<?php


namespace App\Http\Controllers\Statics;

use App\Models\Currency;
use App\Providers\CurrencyServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CurrencyStatic extends Controller
{
 
    public function index(){

        $data = [
            'currencies' => Currency::all(),
        ];
        return view('Admin.Currency.index', $data);
    }
    public function coin_availablity(CurrencyServiceProvider $currency, Request $request,$id){
       $result =  $currency->coin_availablity($request, $id);
       return view('Admin.Currency.index', $id);
    }

    public function create_currency(CurrencyServiceProvider $currency,$request){
        $result = $currency->currency($request);
        return redirect()->back()->with('success', 'ارز ساخته شد');
        
    }

}