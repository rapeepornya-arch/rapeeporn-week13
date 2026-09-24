<?php

namespace Tests\Unit;

use App\Models\Blog;
use Tests\TestCase;

class Week07Test extends TestCase
{
    public function test_blog_factory_matches_week_seven_schema(): void
    {
        $blog = Blog::factory()->make();

        $this->assertNotEmpty($blog->title);
        $this->assertNotEmpty($blog->content);
        $this->assertIsBool($blog->status);
        $this->assertSame(['title', 'content', 'status'], $blog->getFillable());
    }
}
