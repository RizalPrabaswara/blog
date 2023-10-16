<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function create()
    {
        // if (auth()->guest())
        // {
        //     abort(403);
        // }

        // if (auth()->user()->username != 'adminsuper')
        // {
        //     abort(403);
        // }

        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create([
            'title' => $attributes['title'],
            'thumbnail' => $attributes['thumbnail'],
            'slug' => $attributes['slug'],
            'excerpt' => $attributes['excerpt'],
            'body' => $attributes['body'],
            'category_id' => $attributes['category_id'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/posts');
    }
}
