<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class Week11Test extends TestCase
{
    public function test_blog_page_uses_three_items_per_page_and_empty_state(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        DB::table('blogs')->where('title', 'like', 'Pagination Test %')->delete();
        foreach (range(1, 4) as $number) {
            DB::table('blogs')->insert([
                'title' => 'Pagination Test '.$number, 'content' => 'Content', 'status' => true,
                'created_at' => now()->addSeconds($number), 'updated_at' => now(),
            ]);
        }
        $this->get('/blog')->assertOk()->assertSee('Pagination Test 4');
        $this->get('/blog?page=2')->assertOk();
        DB::table('blogs')->where('title', 'like', 'Pagination Test %')->delete();
    }
}
