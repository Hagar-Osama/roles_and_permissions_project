<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        session()->flash('success', 'Post Added Successfully');
        return redirect(route('posts.index'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        session()->flash('success', 'Post Updated Successfully');
        return redirect(route('posts.index'));

    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Post Deleted Successfully');
        return redirect(route('posts.index'));


    }



}
