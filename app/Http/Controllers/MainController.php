<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Index(Request $request)
    {
        return view('index');
    }
    public function Posts(Request $request)
    {
//        $categories = Category::query()->get();
//        dd($categories);
        $posts = Post::query()->with('Tags')->get();
        dd($posts);
        return view('posts.index');
    }

}
