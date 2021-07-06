<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Models\Pages;
use Illuminate\Http\Request;

class PageServices
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'body' => 'required',
            'page_type' => 'required'
        ], [
            'name.required' => 'field is empty',
            'body.required' => 'field is empty',
            'page_type.required' => 'field is empty'
        ]);
        try {
            $page = Pages::create($validated);
            return ['msg' => 'success', 'page' => $page, 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
