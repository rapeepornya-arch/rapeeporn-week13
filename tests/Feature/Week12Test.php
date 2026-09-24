<?php

namespace Tests\Feature;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class Week12Test extends TestCase
{
    public function test_laravel_ui_authentication_and_admin_protection_work(): void
    {
        $this->assertTrue(class_exists(\Laravel\Ui\UiServiceProvider::class));
        $this->get('/login')->assertOk()->assertSee('เข้าสู่ระบบ');
        $this->get('/register')->assertOk();
        $this->get('/dashboard')->assertRedirect(route('login'));
        $this->get('/blog')->assertRedirect(route('login'));
        $this->assertStringContainsString("middleware('auth')", file_get_contents((new \ReflectionClass(AdminController::class))->getFileName()));

        $user = User::query()->updateOrCreate(
            ['email' => 'week12-test@example.com'],
            ['name' => 'Week 12 Test', 'password' => Hash::make('password123')]
        );
        try {
            $this->post('/login', ['email' => $user->email, 'password' => 'password123'])
                ->assertRedirect('/blog');
            $this->actingAs($user)->get('/checkout')->assertOk();
            $this->actingAs($user)->get('/blog')->assertOk();
        } finally {
            $user->delete();
        }
    }
}