<?php 
namespace App\Models;
use Illuminate\Support\Arr;

class Post{
    public static function all(){
        return [
            [
                'title' => 'Judul Post Pertama',
                'slug' => 'post-1',
                'author' => 'Dendi Prasetyo',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
            ],
            [
                'title' => 'Judul Post Kedua',
                'slug' => 'post-2',
                'author' => 'Dendi Prasetyo',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
            ]
        ];
    }

    public static function find($slug): array{
        // return Arr::first(static::all(), function($p) use ($slug){
        //     return $p['slug'] === $slug;
        // });
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] === $slug);
        if(!$post){
          abort(404);
        }
        return $post;
    }
}