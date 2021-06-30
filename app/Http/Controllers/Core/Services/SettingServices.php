<?php


namespace App\Http\Controllers\Core\Services;

use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SettingServices
{


    public function maintenance_on(Request $request)
    {
        try {
            $request->validate([
                'msg' => 'required',
            ], [
                'msg.required' => 'message is required',
            ]);
            $command = Artisan::call('down');
            Log::create(['action' => ' حالت بازسازی سایت = روشن', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => $request->message];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
    public function maintenance_off(Request $request)
    {
        try{
            $command = Artisan::call('up');
            Log::create(['action' => ' حالت بازسازی سایت = خاموش ', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Your App is live now'];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
       
    }
}
