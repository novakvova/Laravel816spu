<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Index(Request $request)
    {
        return view('index');
    }
    public function Posts(Request $request)
    {
        $categories = Category::query()->get();
        dd($categories);
        return view('posts.index');
    }

}
