<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Image;
class PostController extends Controller
{
    //TODO: We Need Meessage Helper Function With Response Code Handler In Kernel
    public function create_post(Request $request)
    {
        $validated =  $request->validate([
            'title' => 'required',
            'body' => 'required'
        ], [
            'title.required' => 'title is required',
            'body.required' => 'body is required',
        ]);
        try {
            $path = public_path('Images/post/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $time = time();
            $cover = 'Square' . $time . '.' . $request->image->extension();
            $original_image = Image::make($request->image)->save(('Images/post/').$cover, 80);
            $post = Posts::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::user()->id,
                'image_path' => $cover
            ]);
            $post_resource = new PostResource($post);
            return response()->json(['msg' => 'Post created successfully', 'post' => $post_resource],201);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
    public function delete_post(Request $request, $id)
    {
        try {
            Posts::findOrFail($id)->delete();
            return response()->json(['msg' => 'Post deleted Successfully'],204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => 'requested record does not exists'],404);
        } catch(\Exception $e){
            return response()->json(['msg' => $e->getMessage()],500);

        }
    }
    public function get_post(Request $request, $p = null){

        try{
            if($request->query('p') == 'all'){
                $posts = Posts::all();
            }else {
                $posts = Posts::paginate(10);
            }
            return response()->json(['posts'=>$posts],200);
        }catch(\Exception $e){
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
    public function edit_post(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ],[
            'title.required' => 'title is required',
            'body.required' => 'body is required'
        ]);
        try{
            $post = Posts::findOrFail($id);
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            return response()->json(['msg'=>'Post updated Successfully','post' => $post],200);
        }catch(\Exception $e){
            return response()->json(['msg' => $e->getMessage()],500);
        }
    }
}
