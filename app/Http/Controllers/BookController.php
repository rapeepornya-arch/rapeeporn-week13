<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        return view('books.index', ['books' => [
            ['title' => 'Laravel สำหรับผู้เริ่มต้น', 'author' => 'สมชาย ใจดี', 'price' => 350, 'available' => true],
            ['title' => 'พัฒนาเว็บด้วย PHP', 'author' => 'สุดา รักเรียน', 'price' => 295, 'available' => false],
            ['title' => 'Bootstrap 5 ฉบับใช้งานจริง', 'author' => 'กิตติ นักพัฒนา', 'price' => 280, 'available' => true],
        ]]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('books.index')->with('status', 'รับข้อมูลหนังสือแล้ว');
    }
}
