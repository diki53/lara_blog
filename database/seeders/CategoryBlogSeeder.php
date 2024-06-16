<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CategoryBlog::factory(3)->create();
        CategoryBlog::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        CategoryBlog::create([
            'name' => 'Web Development',
            'slug' => 'web-development'
        ]);
        CategoryBlog::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux'
        ]);
        CategoryBlog::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        CategoryBlog::create([
            'name' => 'Data Structure',
            'slug' => 'data-structure'
        ]);
    }
}
