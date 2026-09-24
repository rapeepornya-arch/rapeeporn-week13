<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('student.full_name_th'))</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/student-theme.css') }}">
</head>
<body data-student-template="{{ config('student.theme_slug') }}">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('landing') }}">{{ config('student.full_name_th') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="เปิดเมนู">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">เกี่ยวกับเรา</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">บทความของฉัน</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('create') }}">เขียนบทความ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">สินค้า</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">หนังสือ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('week7-original.index') }}">Week 7 เดิม</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a></li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('home') }}">หน้าสมาชิก</a>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">แดชบอร์ด</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>