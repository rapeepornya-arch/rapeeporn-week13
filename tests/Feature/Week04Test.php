<?php

namespace Tests\Feature;

use Tests\TestCase;

class Week04Test extends TestCase
{
    public function test_week_four_pages_render(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        $this->get('/')
            ->assertOk()
            ->assertSee('ยินดีต้อนรับสู่เว็บไซต์ของเรา')
            ->assertSee(config('student.full_name_th'));
        $this->get('/about')->assertOk()->assertSee(config('student.full_name_th'));

        $blog = $this->get('/blog')->assertOk()->assertSee('บทความ');
        if ((int) substr(basename(base_path()), 5) <= 8) {
            $blog->assertSee('เผยแพร่')->assertSee('ฉบับร่าง');
        }
    }
}
