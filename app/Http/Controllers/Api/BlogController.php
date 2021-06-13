<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function create_blog(Request $request)
    {
        $validated =  $request->validate([
            'title' => 'required',
            'body' => 'required'
        ], [
            'title.required' => 'title is required',
            'body.required' => 'body is required',
        ]);
        try {
            $blog = Blog::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::id(),
            ]);
            $blog_resource = new BlogResource($blog);
            return response()->json(['msg' => 'Blog created successfully', 'blog' => $blog_resource, 201]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
    public function delete_blog(Request $request, $id)
    {
        try {
            Blog::findOrFail($id)->delete();
            return response()->json(['msg' => 'Blog deleted Successfully', 204]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
    public function get_blog(Request $request, $p = null){
        try{
            if($request->query('p') == 'all'){
                $blogs = Blog::all();   
            }else {
                $blogs = Blog::paginate(10);
            }
            return response()->json(['blogs'=>$blogs,200]);
        }catch(\Exception $e){
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
    public function edit_blog(Request $request, $id){
        try{
            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            return response()->json(['msg'=>'Blog updated Successfully',200]);
        }catch(\Exception $e){
            return response()->json(['msg' => $e->getMessage(), 500]);
        }
    }
}
