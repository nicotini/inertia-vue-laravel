<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {   
        $posts = Post::all();
        $posts = PostResource::collection($posts)->resolve();
       
        
        return inertia('Post/Index', compact('posts'));
    }

    public function show(Post $post) 
    {
        $post = new PostResource($post);
        $post = $post->resolve();
        
        return inertia('Post/Show', compact('post'));
    }

    public function create()
    {
        return inertia('Post/Create');
    }
    public function store(StoreRequest $request)
    {
         $data = $request->validated();
         Post::firstOrCreate($data);
         return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return inertia('Post/Edit', compact('post'));
    }

    public function update(Post $post, UpdateRequest $request)
    {
       $post->update($request->validated());
       return redirect()->route('post.index');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
