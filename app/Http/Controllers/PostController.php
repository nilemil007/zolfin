<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::latest()->get();

        return view('backend.modules.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();

        return view('backend.modules.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','min:3','max:150','string'],
            'content' => ['required','min:3'],
            'status' => ['required'],
            'category_id' => ['required'],
            'tags' => ['required'],
            'thumbnail' => ['required','image','mimes:jpg,png,jpeg'],
        ]);

        $data['user_id'] = Auth::id();

        if ($request->hasFile('thumbnail'))
        {
            $thumbnail = 'post'.$request->thumbnail->hashname();
            $request->thumbnail->storeAs('posts/thumbnails', $thumbnail);
            $data['thumbnail'] = $thumbnail;
        }else{
            unset($data['thumbnail']);
        }

        if (Post::create($data)) {
            Toastr::success('New post created successfully.', 'Success');
        } else {
            Toastr::error('Post not created.', 'Error');
        }

        return redirect()->route('admin.post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return 'post show method.';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return 'post edit method.';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        return 'post update method.';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return 'post destroy method.';
    }
}
