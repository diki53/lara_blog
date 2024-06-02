<?php
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Models\CategoryBlog;

Route::get('/', function () {
    return view('home', ['title' => 'Halaman Home']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'Halaman About']);
});
Route::get('/posts', function () {
    return view('posts', ['title' => 'Halaman Blog', 'posts' => Post::all()]);
});
Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::find($post);
    $data=[
        'title' => 'Halaman Post',
        'post' => $post
    ];
    return view('post', $data);
});
Route::get('/authors/{user:username}', function (User $user) {
    // $post = Post::find($post);
    $data=[
        'title' => count($user->posts).' Article By '. $user->name,
        'posts' => $user->posts
    ];
    return view('posts', $data);
});
Route::get('/categories/{category:slug}', function (CategoryBlog $category) {
    // $post = Post::find($post);
    $data=[
        'title' => count($category->posts).' Article in '. $category->name,
        'posts' => $category->posts
    ];
    return view('posts', $data);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Halaman Contact']);
});
Route::resource('products', ProductController::class);
Route::resource('transactions', TransactionController::class);