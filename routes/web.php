<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {

    // DB::listen(function ($query) {
    //     logger($query->sql);
    // }); //tutorial untuk mendengarkan queris sql problem N+1 dan clockwork

    // $posts = Post-Copy123::alli();
    // return view('posts', ['posts' => $posts]); //tutorial YamlFrontMatter Composer

    //return view('posts', ['posts' => Post::all()]);
    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all(),
    ]); //tutorial menghindari lazy
})->name('home'); //Tutorial Filesystem class

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post,
        'categories' => Category::all(),
    ]);
})->name('post'); //tutorial route model binding

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
})->name('category'); //tutorial show all post associated with category

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
    ]);
})->name('author');

// Route::get('/post/{post}', function ($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id),
//     ]);
// });

// Route::get('/post/{post}', function ($slug) {
//     return view('post', [
//         'post' => Post::find($slug),
//     ]);
// })->where('post', '[A-z_\-]+'); //Tutorial Use filesystem class


// Route::get('/post/{post}', function ($slug) {

//     if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
//         return redirect('/posts');
//         //abort(404);
//     }

//     $post = cache()->remember("post.{$slug}", 3600, function() use($path) {
//         var_dump('file_get_contents');
//         return file_get_contents($path);
//     }); //tutorial cache

//     // $post = cache()->remember("post.{$slug}", 3600, fn() => file_get_contents($path));
//     //tutorial cache dengan fn closure


//     return view('post', [
//         'post' => $post,
//     ]);
// })->where('post', '[A-z_\-]+'); //Tutorial Use Wildcard Constraints
