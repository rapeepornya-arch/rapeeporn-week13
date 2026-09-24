<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class Week10Test extends TestCase
{
    public function test_product_edit_update_and_status_change_work(): void
    {
        $id = DB::table('products')->insertGetId([
            'name' => 'Temporary Product', 'price' => 100, 'description' => 'Before update',
            'status' => true, 'created_at' => now(), 'updated_at' => now(),
        ]);
        $this->get('/products/'.$id.'/edit')->assertOk()->assertSee('Temporary Product');
        $this->put('/products/'.$id, ['name' => 'Updated Product', 'price' => 250, 'description' => 'Updated'])
            ->assertRedirect(route('products.index'));
        $this->get('/products/'.$id.'/change')->assertRedirect();
        $this->assertDatabaseHas('products', ['id' => $id, 'name' => 'Updated Product', 'status' => false]);
        DB::table('products')->where('id', $id)->delete();
    }
}
