<?php


namespace App\Http\Controllers\Statics;

use App\Http\Controllers\Core\CurrencyServices;
use App\Models\Currency;
use App\Providers\CurrencyServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CurrencyStatic extends Controller
{
 
    
    public function coin_availablity(CurrencyServices $currency, Request $request,$id){
       $result =  $currency->coin_availablity($request, $id);
       return view('Admin.Currency.index', $id);
    }

    public function create_currency(CurrencyServices $currency, Request $request){
        $result = $currency->create_currency($request);
        return redirect()->back()->with('success', 'ارز ساخته شد');
    }
    public function get_currencies(){
        $data = [
            'currencies' => Currency::all(),
        ];
        return view('Admin.Currency.index', $data);
    }
    public function edit_currency(CurrencyServices $currency,Request $request, $id){
        $currency->edit_currency($request,$id);
        return redirect()->back()->with('success', 'اپدیت شد');
    }
    public function delete_currency(CurrencyServices $currency,Request $request, $id)
    {
      $currency->delete_currency($request,$id);
      return redirect()->back()->with('success', 'حذف شد');
    }

}