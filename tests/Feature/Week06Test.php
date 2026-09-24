<?php

namespace Tests\Feature;

use Tests\TestCase;

class Week06Test extends TestCase
{
    public function test_claim_form_validates_and_accepts_valid_data(): void
    {
        $this->get('/claims/create')->assertOk()->assertSee('Product Claim Form');
        $this->post('/claims', [])->assertSessionHasErrors(['serial_number', 'email', 'symptom', 'urgency']);
        $this->post('/claims', [
            'serial_number' => 'SN-001', 'email' => 'student@example.com',
            'symptom' => 'สินค้าเปิดเครื่องไม่ติด', 'urgency' => 'high',
        ])->assertSessionHasNoErrors()->assertSessionHas('status');
    }
}
