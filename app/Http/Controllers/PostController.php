<?php

namespace App\Http\Controllers;

use App\Helpers\PostAPI;
use App\Http\Requests\PostValidationRequest;
use App\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return $posts;
        $response = PostAPI::FormatResponse(false, 200, '', $posts);
        return response()->json($response);
    }

    public function store(PostValidationRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $res = $post->save();

        if($res){
            $response = PostAPI::FormatResponse(false, 201, 'Post Added Successfully', '');
            return response()->json($response);
        }
        else{
            $response = PostAPI::FormatResponse(false, 400, 'Post Added failed', '');
            return response()->json($response);
        }
    }

    public function show($id)
    {
        $post = Post::find($id);
        // return $post;
        $response = PostAPI::FormatResponse(false, 200, '', $post);
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $res = $post->save();

        if($res){
            $response = PostAPI::FormatResponse(false, 200, 'Post updated Successfully', '');
            return response()->json($response);
        }
        else{
            $response = PostAPI::FormatResponse(false, 400, 'Post update failed', '');
            return response()->json($response);
        }

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $res = $post->delete();

        if($res){
            $response = PostAPI::FormatResponse(false, 200, 'Post deleted Successfully', '');
            return response()->json($response);
        }
        else{
            $response = PostAPI::FormatResponse(false, 400, 'Post delete failed', '');
            return response()->json($response);
        }
    }
}
