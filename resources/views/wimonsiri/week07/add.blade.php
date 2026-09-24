@extends('layouts.app')

@section('title', 'งานเดิม Week 7 - เพิ่มสมาชิก')

@section('content')
<div class="row justify-content-center"><div class="col-lg-7">
    <div class="alert alert-info">ฟอร์มนี้เป็น UI จำลองจากไฟล์เดิม จึงยังไม่บันทึกข้อมูลสมาชิกลงฐานข้อมูล</div>
    <div class="card border-0 shadow-sm"><div class="card-body p-4">
        <h1 class="h3 mb-4">เพิ่มสมาชิกใหม่</h1>
        <form action="#" onsubmit="alert('จำลองการส่งข้อมูลสำเร็จ'); return false;">
            <div class="mb-3"><label class="form-label">ชื่อ-นามสกุล</label><input class="form-control" required></div>
            <div class="mb-3"><label class="form-label">อีเมล</label><input type="email" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">เบอร์โทรศัพท์</label><input type="tel" class="form-control" required></div>
            <div class="mb-4"><label class="form-label">สถานะ</label><select class="form-select"><option>ใช้งานอยู่</option><option>ระงับการใช้งาน</option></select></div>
            <div class="d-flex justify-content-end gap-2"><a href="{{ route('week7-original.home') }}" class="btn btn-light">ยกเลิก</a><button class="btn btn-success">บันทึกข้อมูลจำลอง</button></div>
        </form>
    </div></div>
</div></div>
@endsection