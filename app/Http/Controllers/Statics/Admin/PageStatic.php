<?php


namespace App\Http\Controllers\Statics\Admin;

use App\Http\Controllers\Core\Services\PageServices;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageStatic extends Controller
{

    public function create(Request $request)
    {
        $data = ['pages' => Pages::all()];
        return view('Admin.Pages.index', $data);
    }
    public function store(PageServices $page, Request $request)
    {
        $result = $page->store($request);
        if ($result['error']) {
            return redirect()->back()->with('error', 'something is wrong');
        }
        return redirect()->back()->with('success', 'پیج درخواستی ساخته شد');
    }
}
