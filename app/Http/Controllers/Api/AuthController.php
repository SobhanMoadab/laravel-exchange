<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
   public function register(Request $request)
   {
       $request->validate([],[]);
       return response()->json();
       
   }
}
