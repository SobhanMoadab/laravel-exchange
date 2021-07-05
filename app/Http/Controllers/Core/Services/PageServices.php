<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use Illuminate\Http\Request;

class PageServices
{

    public function index()
    {
        return view();
    }
    public function create(Request $request)
    {
        return view('Admin.Pages.index');
    }
}
