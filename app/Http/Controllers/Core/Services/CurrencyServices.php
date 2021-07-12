<?php


namespace App\Http\Controllers\Core\Services;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
            Log::create(['action' => 'وضعیت کوین تغییر یافت', 'user_id' => Auth::id(), 'is_admin' => true]);
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
            Log::create(['action' => 'کوین ساخته شد', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Success', 'currency' => $currency, 'error' => null];
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
            Log::create(['action' => 'دریافت لیست کوین ها', 'user_id' => Auth::id(), 'is_admin' => true]);
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
            Log::create(['action' => 'اپدیت  کوین انجام شد', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Post updated Successfully', 'currency' => $currency,'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function delete_currency(Request $request, $id)
    {
        try {
            $currency = Currency::findOrFail($id);
            $currency->delete();
            Log::create(['action' => '  کوین حذف شد', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Post deleted Successfully', 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    
}
