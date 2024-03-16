<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostApiResource;
use App\Http\Resources\PostsAPiResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostsAPiResource::collection(Post::paginate(12));
    }

    public function show(Post $post)
    {
        return new PostApiResource($post);
    }
}
