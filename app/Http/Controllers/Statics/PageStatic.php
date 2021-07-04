<?php


namespace App\Http\Controllers\Statics;

use Illuminate\Routing\Controller;

class PageStatic extends Controller
{

    public function home(){
        return view('Admin.Home');
    }
}