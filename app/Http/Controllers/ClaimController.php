<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'serial_number' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email'],
            'symptom' => ['required', 'string', 'min:10'],
            'urgency' => ['required', 'in:low,normal,high'],
        ]);

        return back()->with('status', 'รับเรื่องแจ้งเคลมแล้ว');
    }
}
