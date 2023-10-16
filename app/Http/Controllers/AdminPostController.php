<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
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
        // $post = new Post();

        $attributes = $this->validatePost();

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

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    public function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required','image'],
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')],
        ]);
    }
}
