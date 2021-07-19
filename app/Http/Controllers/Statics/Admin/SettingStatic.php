<?php

namespace App\Http\Controllers\Statics\Admin;

use App\Http\Controllers\Core\SettingServices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SettingStatic
{
    public function setting(){
        // add view path
        // return view();
    }
    public function maintenance_on(SettingServices $setting,Request $request)
    {
       $result = $setting->maintenance_on($request);
       return redirect()->back()->with('success', 'انجام شد');

    }
    public function maintenance_off(Request $request)
    {
       
    }
}