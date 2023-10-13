<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\NewsLetter;
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

Route::post('newsletter', NewsletterController::class); //tutorial Mailchimp NewsLetter

Route::get(
    '/posts',
    [PostController::class, 'index']
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // }); //tutorial untuk mendengarkan queris sql problem N+1 dan clockwork

    // $posts = Post-Copy123::alli();
    // return view('posts', ['posts' => $posts]); //tutorial YamlFrontMatter Composer

    //return view('posts', ['posts' => Post::all()]);
    // return view('posts', [
    //     //'posts' => Post::latest()->get(),
    //     'posts' => $posts->get(),
    //     'categories' => Category::all(),
    // ]); //tutorial menghindari lazy
)->name('home'); //Tutorial Filesystem class

Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post'); //tutorial route model binding

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all(),
//     ]);
// })->name('category'); //tutorial show all post associated with category

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//         'posts' => $author->posts,
//     ]);
// })->name('author');

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

Route::post('/post/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comments'); //tutorial route model binding

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
