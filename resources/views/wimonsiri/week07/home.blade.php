@extends('layouts.app')

@section('title', 'งานเดิม Week 7 - สมาชิก')

@section('content')
@php
    $members = [
        ['name' => 'สมชาย ใจดี', 'email' => 'somchai@example.com', 'phone' => '081-234-5678', 'status' => 'ใช้งานอยู่'],
        ['name' => 'สมหญิง รักเรียน', 'email' => 'somying@example.com', 'phone' => '089-876-5432', 'status' => 'ระงับการใช้งาน'],
        ['name' => 'นภา สงบใจ', 'email' => 'napa@example.com', 'phone' => '082-999-1122', 'status' => 'ใช้งานอยู่'],
        ['name' => 'วิชัย กล้าหาญ', 'email' => 'wichai@example.com', 'phone' => '085-444-5566', 'status' => 'รอการตรวจสอบ'],
        ['name' => 'อรอนงค์ งดงาม', 'email' => 'onanong@example.com', 'phone' => '087-111-2233', 'status' => 'ระงับการใช้งาน'],
    ];
@endphp
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div><p class="text-muted mb-1">สวัสดี {{ $username }}</p><h1 class="h2 mb-0">ตารางรายชื่อสมาชิก</h1></div>
    <div class="d-flex gap-2">
        <a href="{{ route('week7-original.add') }}" class="btn btn-success">เพิ่มสมาชิกจำลอง</a>
        <form method="POST" action="{{ route('week7-original.logout') }}">@csrf<button class="btn btn-outline-danger">ออกจากระบบจำลอง</button></form>
    </div>
</div>
<div class="card border-0 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark"><tr><th>#</th><th>ชื่อ-นามสกุล</th><th>อีเมล</th><th>โทรศัพท์</th><th>สถานะ</th></tr></thead>
            <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td><td class="fw-semibold">{{ $member['name'] }}</td><td>{{ $member['email'] }}</td><td>{{ $member['phone'] }}</td>
                    <td><span class="badge {{ $member['status'] === 'ใช้งานอยู่' ? 'text-bg-success' : ($member['status'] === 'รอการตรวจสอบ' ? 'text-bg-warning' : 'text-bg-danger') }}">{{ $member['status'] }}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection