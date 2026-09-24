<?php

namespace Tests\Feature;

use Tests\TestCase;

class WimonsiriWeek07CarryForwardTest extends TestCase
{
    public function test_original_week_seven_pages_are_available_under_a_safe_prefix(): void
    {
        $this->get(route('week7-original.index'))->assertOk()->assertSee('รายการบทความทั้งหมด');
        $this->get(route('week7-original.about'))->assertOk()->assertSee(config('student.full_name_th'));
        $this->get(route('week7-original.blogs'))->assertOk()->assertSee('บทความจาก Array');
        $this->get(route('week7-original.login'))->assertOk()->assertSee('เข้าสู่ระบบจำลอง');
    }

    public function test_original_demo_login_uses_its_own_session_and_logout_route(): void
    {
        $this->post(route('week7-original.login.store'), [
            'username' => 'wimonsiri',
            'password' => 'week-seven-demo',
        ])->assertRedirect(route('week7-original.home'))
            ->assertSessionHas('week07_demo_user', 'wimonsiri');

        $this->withSession(['week07_demo_user' => 'wimonsiri'])
            ->get(route('week7-original.home'))
            ->assertOk()
            ->assertSee('wimonsiri');

        $this->withSession(['week07_demo_user' => 'wimonsiri'])
            ->post(route('week7-original.logout'))
            ->assertRedirect(route('week7-original.login'))
            ->assertSessionMissing('week07_demo_user');
    }
}