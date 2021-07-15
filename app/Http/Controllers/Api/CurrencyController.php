<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Currency;
use Illuminate\Routing\Controller;

class CurrencyController extends Controller
{
    public function get_currencies()
    {
        return response()->json(['currencies' => Currency::all()]);
    }
}
