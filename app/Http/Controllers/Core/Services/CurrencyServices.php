<?php


namespace App\Http\Controllers\Core\Services;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// todo
//  require_once( __DIR__ . "..\PHP-websocket-client\websocket_client.php");

class CurrencyServices
{
    // crud for currency
    // currencies can be turned off and on

    public function coin_availablity($request, $id)
    {
        $request->validate([
            'state' => 'required',
        ], [
            'state.required' => 'declare the state',
        ]);
        try {
            $currency = Currency::findOrFail($id);
            if ($request->state === 0) {
                $currency->update([
                    'is_active' => 0,
                ]);
            } elseif ($request->state === 1) {
                $currency->update([
                    'is_active' => 1,
                ]);
            }
            return ['currency' => $currency];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }

    public function create_currency(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:currencies,name',
            'is_active' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'name is required',
            'is_active.required' => 'is_active is required',
            'price.required' => 'price is required',

        ]);
        if($request->is_active){
            $request->is_active = 1;
        } else{
            $request->is_active = 0;
        }
        try {
            $currency = Currency::create([
                'name' => $request->name,
                'min' => $request->min,
                'max' => $request->max,
                'icon' => $request->icon,
                'is_active' => $request->is_active,
                'price' => $request->price,
                'admin_id' => Auth::id(),
            ]);
            $currency_resource = new CurrencyResource($currency);
            return ['msg' => 'Success', 'currency' => $currency_resource, 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e];
        }
    }
    public function get_currencies(Request $request)
    {
        try {
            if ($request->query('p') === 'all') {
                $currencies = Currency::all();
            } else {
                $currencies = Currency::paginate(10);
            }
            return ['currencies' => $currencies, 'error'=>null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function edit_currency(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'is_active' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'name is required',
            'is_active.required' => 'is_active is required',
            'price.required' => 'price is required',
        ]);
        try {
            $currency = Currency::findOrFail($id);
            if (!$request->has('image')) {
                $currency->update([
                    'name' => $request->name,
                    'is_active' => $request->is_active,
                    'price' => $request->price,
                ]);
            } else {
                $currency->update([
                    'name' => $request->name,
                    'is_active' => $request->is_active,
                    'price' => $request->price,
                    'icon' => $request->image,
                ]);
            }
            $currency_resource = new CurrencyResource($currency);

            return response()->json(['msg' => 'Post updated Successfully', 'currency' => $currency_resource], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    public function delete_currency(Request $request, $id)
    {
        try {
            $currency = Currency::findOrFail($id);
            $currency->delete();
            return response()->json(['msg' => 'Post deleted Successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    
}
