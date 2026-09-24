@extends('layouts.app')

@section('title', 'งานเดิม Week 7 - เข้าสู่ระบบจำลอง')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <p class="text-uppercase small text-muted">Week 7 Original</p>
                <h1 class="h3 mb-3">เข้าสู่ระบบจำลอง</h1>
                <div class="alert alert-warning">แบบฝึกนี้เก็บเฉพาะชื่อผู้ใช้ใน session และแยกจากระบบ Authentication จริงของ Week 12</div>
                <form method="POST" action="{{ route('week7-original.login.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="week07-username" class="form-label">ชื่อผู้ใช้หรืออีเมล</label>
                        <input id="week07-username" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="week07-password" class="form-label">รหัสผ่านสำหรับแบบฝึก</label>
                        <input id="week07-password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-dark w-100">เข้าสู่หน้ารายชื่อสมาชิก</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection