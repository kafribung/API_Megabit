<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

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
        $data['slug'] = Str::slug($request->title);
        dd($data['slug']);
    }

    // Show
    public function show($id)
    {
        //
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
