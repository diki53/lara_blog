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
    // $posts = Post::with('author', 'category')->latest()->get();
    // $posts = Post::latest();
    // if(request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }

    // $posts = Post::latest()->get();
    return view('posts', ['title' => 'Halaman Blog', 'posts' => Post::filter(request(['search','category','author']))->latest()->get()]);
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
    // $posts = $user->posts->load('author', 'category');
    $data=[
        'title' => count($user->posts).' Article By '. $user->name,
        'posts' => $user->posts
    ];
    return view('posts', $data);
});
Route::get('/categories/{category:slug}', function (CategoryBlog $category) {
    // $post = Post::find($post);
    // $posts = $category->posts->load('category', 'author');
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