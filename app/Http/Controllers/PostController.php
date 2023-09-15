<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            //'posts' => Post::latest()->get(),
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
            // 'categories' => Category::all(),
        ]); //tutorial menghindari lazy
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            //'comments' => Comment::where('post_id', $post->id)->get(),
            // 'categories' => Category::all(),
        ]);
    }
}
