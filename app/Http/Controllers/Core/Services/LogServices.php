<?php


namespace App\Http\Controllers\Core\Services;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LogServices
{
    // todo remove param and make it form request
    // custom 30'60'90, 120
    
    public function truncate_log(Request $request, $days)
    {
        // $validate = $request->validate([
        //     'day' => 'required|integer'
        // ], [
        //     'day.required' => 'requested days cannot be empty'
        // ]);
        try {
            // Artisan::call('cronjob:log', ['days' => $validate['days']]);
            $logs = Artisan::call('cronjob:log', ['days' => $days]);
            return ['msg' => 'logs deleted successfully'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
