<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function about(): View
    {
        return view('about', ['name' => config('student.full_name_th'), 'data' => now()->format('d/m/Y')]);
    }

    public function create(): View
    {
        return view('form');
    }

    public function blog(): View
    {
        return view('blog', ['blogs' => DB::table('blogs')->latest()->paginate(3)]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(['title' => ['required', 'max:255'], 'content' => ['required']]);
        DB::table('blogs')->insert($data + ['status' => true, 'created_at' => now(), 'updated_at' => now()]);

        return redirect()->route('blog')->with('status', 'เพิ่มบทความแล้ว');
    }

    public function delete(int $id): RedirectResponse
    {
        DB::table('blogs')->where('id', $id)->delete();

        return redirect()->route('blog')->with('status', 'ลบบทความแล้ว');
    }
}