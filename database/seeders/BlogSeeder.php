<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $missingBlogs = max(0, 100 - Blog::query()->count());

        if ($missingBlogs > 0) {
            Blog::factory()->count($missingBlogs)->create();
        }
    }
}
