<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Auth\JsonFormatter;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\Post\PostRequest;

class PostController extends Controller
{
    // READ
    public function index()
    {
        $posts =  Post::with('user')->get();
        return PostResource::collection($posts);
    }

    // Store
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['slug'] = \Str::slug($request->title);
        if (Post::where('slug', $data['slug'])->first() != null ) {
            $data['slug'] .= rand(1, 5);
        }
        $request->user()->posts()->create($data);
        return JsonFormatter::success($data, 'Post Berhasil ditambahkan');
    }

    // Show
    public function show($id)
    {
        
    }

    // Edit 
    public function edit($id)
    {
        //
    }

    // Update
    public function update(Request $request, $id)
    {
        //
    }

    // Delete
    public function destroy($id)
    {
        //
    }
}
