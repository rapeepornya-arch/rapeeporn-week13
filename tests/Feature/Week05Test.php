<?php

namespace Tests\Feature;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class Week05Test extends TestCase
{
    public function test_lesson_routes_use_controllers_and_the_article_form_loads(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        $this->assertStringStartsWith(AdminController::class.'@', Route::getRoutes()->getByName('about')->getActionName());
        $this->assertStringStartsWith(AdminController::class.'@', Route::getRoutes()->getByName('blog')->getActionName());

        $this->get('/about')->assertOk();
        $this->get('/blog')->assertOk()->assertSee('บทความ');
        $this->get('/create')
            ->assertOk()
            ->assertSee('เขียนบทความใหม่')
            ->assertSee('name="title"', false)
            ->assertSee('name="content"', false);
    }

    public function test_week_five_blog_uses_a_bootstrap_table_and_status_condition(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        if (basename(base_path()) !== 'week-05') {
            $this->markTestSkipped('The blog screen evolves after Week 5.');
        }

        $this->get('/blog')
            ->assertOk()
            ->assertSee('table-striped', false)
            ->assertSee('เผยแพร่')
            ->assertSee('ฉบับร่าง');
    }

    public function test_product_controller_workshop_page_and_form_work(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        if ((int) substr(basename(base_path()), 5) >= 10) {
            $this->markTestSkipped('The product screen evolves to Query Builder in Week 10.');
        }

        $this->get('/products')->assertOk()->assertSee('Laravel Book')->assertSee('table-striped', false);
        $this->post('/products', ['name' => 'Test Product'])
            ->assertRedirect()
            ->assertSessionHas('status');
    }

    public function test_book_controller_assignment_has_a_table_and_form(): void
    {
        $this->withoutMiddleware(\Illuminate\Auth\Middleware\Authenticate::class);
        $this->assertStringStartsWith(BookController::class.'@', Route::getRoutes()->getByName('books.index')->getActionName());

        $this->get('/books')
            ->assertOk()
            ->assertSee('Laravel สำหรับผู้เริ่มต้น')
            ->assertSee('table-striped', false);

        $this->get('/books/create')
            ->assertOk()
            ->assertSee('แบบฟอร์มเพิ่มหนังสือ')
            ->assertSee('name="title"', false)
            ->assertSee('name="author"', false)
            ->assertSee('name="price"', false);

        $this->post('/books', ['title' => 'หนังสือทดสอบ'])
            ->assertRedirectToRoute('books.index')
            ->assertSessionHas('status');
    }
}
