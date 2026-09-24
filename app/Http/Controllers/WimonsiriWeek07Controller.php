<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WimonsiriWeek07Controller extends Controller
{
    public function index(): View
    {
        return view('wimonsiri.week07.index', [
            'blogs' => Blog::query()->latest()->paginate(10),
        ]);
    }

    public function login(): View
    {
        return view('wimonsiri.week07.login');
    }

    public function loginStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:100'],
        ]);

        $request->session()->put('week07_demo_user', $validated['username']);

        return redirect()->route('week7-original.home');
    }

    public function home(Request $request): View
    {
        return view('wimonsiri.week07.home', [
            'username' => $request->session()->get('week07_demo_user', 'ผู้เข้าชม'),
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('week07_demo_user');

        return redirect()->route('week7-original.login');
    }

    public function add(): View
    {
        return view('wimonsiri.week07.add');
    }

    public function about(): View
    {
        return view('wimonsiri.week07.about', [
            'name' => config('student.full_name_th'),
            'date' => now()->format('Y-m-d'),
        ]);
    }

    public function blogs(): View
    {
        return view('wimonsiri.week07.blogs', [
            'blogs' => [
                ['title' => 'บทความที่ 1', 'content' => 'เนื้อหาบทความที่ 1', 'status' => true],
                ['title' => 'บทความที่ 2', 'content' => 'เนื้อหาบทความที่ 2', 'status' => true],
                ['title' => 'บทความที่ 3', 'content' => 'เนื้อหาบทความที่ 3', 'status' => false],
            ],
        ]);
    }
}