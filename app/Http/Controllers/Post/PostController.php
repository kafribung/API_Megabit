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
        $this->margeSlug($data['slug']);
        $request->user()->posts()->create($data);
        return JsonFormatter::success($data, 'Post Berhasil ditambahkan');
    }

    // Show
    public function show(Post $post)
    {
        return PostResource::make($post);
    }

    // Update
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);
        $data = $request->all();
        $data['slug'] = \Str::slug($request->title);
        $this->margeSlug($data['slug']);
        $post->update($data);
        return JsonFormatter::success($data, 'Post Berhasil diupdate');
    }

    // Delete
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        $post->delete();
        return JsonFormatter::success(true, 'Post Berhasil dihapus');
    }

    // Generate Slug
    public function margeSlug($data)
    {
        if (Post::where('slug', $data)->first() != null ) {
            return $data .= rand(1, 5);
        }
    }
}
