@extends('layouts.app')

@section('title', 'งานเดิม Week 7 - เกี่ยวกับเรา')

@section('content')
<div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
    <p class="text-uppercase small text-muted">Week 7 Original</p>
    <h1 class="h2">เกี่ยวกับเรา</h1><hr>
    <p><strong>ผู้พัฒนาระบบ:</strong> {{ $name }}</p>
    <p><strong>วันที่เปิดดู:</strong> {{ $date }}</p>
    <p class="text-muted mb-0">หน้านี้ปรับจากไฟล์ abouts.blade.php ในโปรเจกต์เดิม และแก้ชื่อผู้พัฒนาให้ตรงกับเจ้าของงาน</p>
</div></div>
@endsection