<?php


namespace App\Http\Controllers\Statics;

use App\Http\Controllers\Core\Services\PageServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageStatic extends Controller
{

    public function index()
    {
        return view();
    }
    public function create(Request $request)
    {
        return view('Admin.Pages.index');
    }
    public function store(PageServices $page,Request $request){
        $result = $page->store($request);
        if($result['error']){
            return redirect()->back()->with('error', 'something is wrong');
        }
        return redirect()->back()->with('success', 'پیج درخواستی ساخته شد');
    }
    
}