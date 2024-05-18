<?php
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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
Route::get('/contact', function () {
    return view('contact', ['title' => 'Halaman Contact']);
});
Route::resource('products', ProductController::class);
Route::resource('transactions', TransactionController::class);