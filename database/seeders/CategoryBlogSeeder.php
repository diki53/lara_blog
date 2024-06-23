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
            'slug' => 'web-design',
            'color' => 'red'
        ]);
        CategoryBlog::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'color' => 'green'
        ]);
        CategoryBlog::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'yellow'
        ]);
        CategoryBlog::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'blue'
        ]);
        CategoryBlog::create([
            'name' => 'Data Structure',
            'slug' => 'data-structure',
            'color' => 'purple'
        ]);
    }
}
