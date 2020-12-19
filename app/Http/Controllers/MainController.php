<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function Store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'description_short' => 'required',
            'id_category' => 'required'
        ]);
        // dd($request);
        $url='';
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
//                $validated = $request->validate([
//                    'name' => 'string|max:40',
//                    'image' => 'mimes:jpeg,png|max:1024',
//                ]);
                $extension = $request->image->extension();
                $name = sha1(microtime()) . "." . $extension;
                $request->image->storeAs('/public', $name);

                $url = Storage::url($name);

            }
        }

        Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'description_short' => $request->description_short,
            'url' => $url,
            'id_category' => $request->id_category,
            'id_user' => auth()->id()
        ]);

        return redirect()->route('post.list')
            ->with('success', 'Post created successfully.');
    }

    public function UploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            //  Let's do everything here
            if ($request->file('file')->isValid()) {
                //
//                $validated = $request->validate([
//                    'name' => 'string|max:40',
//                    'file' => 'mimes:jpeg,png|max:1024',
//                ]);
                $extension = $request->file->extension();
                $name = sha1(microtime()) . "." . $extension;
                $request->file('file')->storeAs('/public', $name);

                $url = Storage::url($name);
                return response()->json(['link' => $url]);
            }
        }
    }



}
