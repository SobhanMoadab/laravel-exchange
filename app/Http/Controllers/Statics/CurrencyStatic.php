<?php


namespace App\Http\Controllers\Statics;

use App\Http\Controllers\Core\Services\CurrencyServices;
use App\Models\Currency;
use App\Providers\CurrencyServiceProvider;
use Binance;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CurrencyStatic extends Controller
{

    public function coin_availablity(CurrencyServices $currency, Request $request, $id)
    {
        $result =  $currency->coin_availablity($request, $id);
        return view('Admin.Currency.index', $id);
    }

    public function create_currency(CurrencyServices $currency, Request $request)
    {
        $result = $currency->create_currency($request);
        if ($result['error']) {
            // return redirect()->back()->with('error', 'مشکلی پیش اومد :(');
            return $result['error'];
        }
        return redirect()->back()->with('success', 'ارز ساخته شد');
    }


    public function get_currencies(CurrencyServices $currency, Request $request)
    {
        // result either currencies or an exception
        $result = $currency->get_currencies($request);
        if ($result['error']) {
            return redirect()->back()->with('error', 'مشکلی پیش اومد :(');
        }
        return view('Admin.Currency.index', $result);
    }
    
    public function edit_currency(CurrencyServices $currency, Request $request, $id)
    {
        $currency->edit_currency($request, $id);
        return redirect()->back()->with('success', 'اپدیت شد');
    }
    public function delete_currency(CurrencyServices $currency, Request $request, $id)
    {
        $currency->delete_currency($request, $id);
        return redirect()->back()->with('success', 'حذف شد');
    }

    public function coin_data(Request $request)
    {

        $api = new Binance\API();
        return $api;
    }
}
