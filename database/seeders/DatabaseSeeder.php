<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        // CategoryBlog::create([
        //     'name' => 'General',
        //     'slug' => 'general'
        // ]);
        // Post::create([
        //     'title' => 'General Aricle',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'general-article',
        //     'body' => 'you may use the call method to execute additional seed classes. Using the call method allows you to break up your database seeding into multiple files so that no single seeder class becomes too large. The call method accepts an array of seeder classes that should be executed'
        // ]);
        $this->call([
            CategoryBlogSeeder::class,
            UserSeeder::class
        ]);
        Post::factory(100)->recycle([
            CategoryBlog::all(),
            User::all()
        ])->create();
    }
}
