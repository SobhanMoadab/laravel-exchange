<?php

namespace App\Http\Controllers\Statics\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Core\Services\PostServices;
use Illuminate\Support\Facades\Http;

class PostStatic extends Controller
{
    public function get_posts(Request $request, PostServices $post)
    {
        $all_users_with_all_their_roles = User::with('roles')->get();
        $all_users_with_all_direct_permissions = User::with('permissions')->get();
        return ['a' => $all_users_with_all_their_roles, 'b' => $all_users_with_all_direct_permissions];
        $result = $post->get_posts($request);
        return view('Admin.Posts.index', $result);
    }

    public function store_post(Request $request, PostServices $post)
    {
        $result = $post->store_post($request);
        return redirect()->back()->with('success', 'ذخیره شد');
    }
    public function edit_post($id)
    {
        return view('Admin.Posts.index', $id);
    }
    public function update_post(Request $request, PostServices $post, $id)
    {
        $result = $post->update_post($request, $id);
        return redirect()->back()->with('success', 'اپدیت شد');
    }

    public function delete_post(Request $request, PostServices $post, $id)
    {
        $post->delete_post($request, $id);
        return redirect()->back()->with('success', 'پست حذف شد');
    }
}
