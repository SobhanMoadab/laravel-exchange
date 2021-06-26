<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function maintenance_on(Request $request)
    {
        $request->validate([
            'msg' => 'required',
        ], [
            'msg.required' => 'message is required',
        ]);
        $command = Artisan::call('down');
        return response()->json(['msg' => $request->message], 200);
    }
    public function maintenance_off(Request $request)
    {
        $command = Artisan::call('up');
        return response()->json(['msg' => 'Your App is live now'], 200);
    }
}
