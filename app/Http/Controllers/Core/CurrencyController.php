<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// todo
// require_once( "..\PHP-websocket-client\websocket_client.php");

class CurrencyController extends Controller
{
    // crud for currency
    // currencies can be turned off and on

    public function coin_availablity(Request $request, $id)
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
            return response()->json(['msg' => 'success', 'currency' => $currency], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    public function create_currency(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:currencies,name',
            'icon' => 'required',
            'is_active' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'name is required',
            'icon.required' => 'icon is required',
            'is_active.required' => 'is_active is required',
            'price.required' => 'price is required',
        ]);
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
            return response()->json(['msg' => 'Success', 'currency' => $currency_resource], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
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
            return response()->json(['currencies' => $currencies], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
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
            if (! $request->has('image')) {
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
    public function ws_market(Request $request)
    {
        try {
            // subscribe  to stream
            $server = 'stream.binance.com';
            $serverport = 9443;
            $streamname = '!ticker@arr';
            $t = ['method' => 'SUBSCRIBE', 'params' => ["${streamname}"], 'id' => 1];
            $uri = "/ws/${streamname}";

            $message = json_encode($t) . "\n";

            echo "\n*** Connecting to server: ${server} at " . gmdate('Y-m-d H:i:s') . " UTC+0\n";

            $sp = websocket_open($server, $serverport, '', $errstr, 30, true, false, $uri);
            if ($sp) {
                echo "Sending message to server: '" . trim($message) . "' \n";
                websocket_write($sp, $message);
                while (1) {
                    $r = websocket_read($sp, $errstr);
                    echo "${r}\n";
                    if ($r === '') {
                        echo "errstr=${errstr}\n";
                        die;
                    }
                }
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
}
