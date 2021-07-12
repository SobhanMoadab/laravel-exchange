<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Models\Log;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $page = Pages::create([
                'name' => $request->name,
                'body' => $request->body,
                'admin_id' => Auth::id(),
                'page_type' => $request->page_type,
            ]);
            Log::create(['action' => 'پیج ساخته شد', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'success', 'page' => $page, 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function edit_currency(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'page_type' => 'required'
        ], [
            'name.required' => 'field is empty',
            'body.required' => 'field is empty',
            'page_type.required' => 'field is empty'
        ]);
        try {
            $page = Pages::findOrFail($id);
            $page->update([
                'name' => $request->name,
                'body' => $request->body,
                'page_type' => $request->page_type,
            ]);
            Log::create(['action' => 'پیج اپدیت شد', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Post updated Successfully', 'currency' => $page, 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function delete(Request $request, $id)
    {
        try {
            $page = Pages::findOrFail($id);
            $page->delete();
            Log::create(['action' => '  پیج حذف شد', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Page deleted Successfully', 'error' => null];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
