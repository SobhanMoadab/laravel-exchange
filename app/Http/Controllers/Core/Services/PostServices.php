<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core\Services;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Image;

class PostServices
{
    public function store_post($request)
    {
        $validated =  $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'title is required',
            'body.required' => 'body is required',
            'image.required' => 'image is required',
        ]);
        try {
            $path = public_path('Images/post/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $time = time();
            $cover = 'Square' . $time . '.' . $request->image->extension();
            $original_image = Image::make($request->image)->save(('Images/post/') . $cover, 80);
            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::user()->id,
                'image_path' => $cover
            ]);
            $post_resource = new PostResource($post);
            Log::create(['action' => ' ایجاد پست', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['post' => $post_resource];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
    public function delete_post($request, $id)
    {
        try {
            Post::findOrFail($id)->delete();
            Log::create(['action' => ' حذف پست', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['msg' => 'Post deleted Successfully'];

        } catch (ModelNotFoundException $e) {
            return ['msg' => 'requested record does not exists'];
        } catch (\Exception $e) {
            return ['msg' => $e->getMessage()];
        }
    }
    public function get_posts($request, $p = null){

        try{
            if($request->query('p') == 'all'){
                $posts = Post::all();
            }else {
                $posts = Post::paginate(10);
            }
            Log::create(['action' => '  دریافت پست ها', 'user_id' => Auth::id(), 'is_admin' => true]);
            return ['posts'=>$posts];
        }catch(\Exception $e){
            return ['msg' => $e->getMessage()];
        }
    }
    public function update_post($request, $id){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ],[
            'title.required' => 'title is required',
            'body.required' => 'body is required'
        ]);
        try{
            $post = Post::findOrFail($id);
            $Image = public_path("Images\post\\" . $post->image_path);
            if (File::exists($Image)) {
                unlink($Image);
            }
            $path = public_path('Images/post/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $time = time();
            $cover = 'Square' . $time . '.' . $request->image->extension();
            $original_image = Image::make($request->image)->save(('Images/post/').$cover, 80);
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
               'image_path'=> $cover
            ]);
            $post_resource = new PostResource($post);
            Log::create(['action' => 'اپدیت پست ', 'user_id' => Auth::id(), 'is_admin' => true]);
            return response()->json(['msg'=>'Post updated Successfully','post' => $post_resource],200);
        }catch(\Exception $e){
           
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
}
