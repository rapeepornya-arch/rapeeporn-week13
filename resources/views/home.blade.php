@extends('layouts.app')
@section('title', 'หน้าสมาชิก')
@section('content')
<div class="card shadow-sm"><div class="card-body p-4">
    <h1 class="h3">ยินดีต้อนรับ {{ Auth::user()->name }}</h1>
    <p class="text-muted">เข้าสู่ระบบสำเร็จแล้ว</p>
    <a class="btn btn-primary" href="{{ route('create') }}">เขียนบทความ</a>
    <a class="btn btn-outline-primary" href="{{ route('blog') }}">บทความของฉัน</a>
</div></div>
@endsection