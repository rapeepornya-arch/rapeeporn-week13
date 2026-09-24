<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class Week09Test extends TestCase
{
    public function test_blog_query_builder_page_and_validation_work(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        $this->get('/blog')->assertOk();
        $this->post('/blog', [])->assertSessionHasErrors(['title', 'content']);

        $id = DB::table('blogs')->insertGetId([
            'title' => 'Temporary Week 9 Test', 'content' => 'Temporary content',
            'status' => false, 'created_at' => now(), 'updated_at' => now(),
        ]);
        $this->delete('/delete/'.$id)->assertRedirect(route('blog'));
        $this->assertNull(DB::table('blogs')->find($id));
    }
}
