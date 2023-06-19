<?php

namespace App\Http\Controllers\Zolfin;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
        $posts = Post::all();
        return view('zolfin.modules.blog', compact('posts'));
    }
}
