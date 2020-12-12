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
        $posts = Post::query()->with('Tags') -> with('Category')->get();
        //dd($posts);
//        $items = $posts->map(function ($posts) {
//            return collect($posts->toArray())->only(['id', 'title', 'description_short', 'description', 'url', 'is_published', 'id_category', 'created_at', 'updated_at'])->all();
//        });
        return view('posts.index', ['items'=>$posts]);
    }

    public function Create(Request $request)
    {
        $categories = Category::query()->get();
        // Post::query()->array_push($posts );
        return view('posts.create', ['category' => $categories, 'title' => 'Додати пост']);
    }



}
