<?php

namespace App\Http\Controllers\Zolfin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ZolfinController extends Controller
{
    // Homepage
    public function zolfin(): View|Application|Factory
    {
        return view('zolfin.home');
    }

    // Blog page
    public function blog(): View|Application|Factory
    {
        $posts = Post::with('category','user')->latest()->paginate(3);
        $recentPost = Post::latest()->take(4)->get();
        return view('zolfin.modules.blog', compact('posts','recentPost'));
    }

    // Posts by category
    public function postsByCategory(Category $category): View|Application|Factory
    {
        $posts = Post::with('user','category')->where('category_id', $category->id)->latest()->paginate(3);
        $recentPost = Post::where('category_id', $category->id)->take(4)->get();

        return view('zolfin.modules.posts-by-category', compact('posts','category','recentPost'));
    }

    // Posts by user
    public function postsByUser(User $user): View|Application|Factory
    {
        $posts = Post::with('user','category')->where('user_id', $user->id)->latest()->paginate(3);
        $recentPost = Post::where('user_id', $user->id)->take(4)->get();

        return view('zolfin.modules.posts-by-user', compact('posts','user','recentPost'));
    }

    // Single blog
    public function singleBlog(Post $post): View|Application|Factory|Foundation\Application
    {
        $post->increment('views');

        return view('zolfin.modules.single-blog', compact('post'));
    }
}
