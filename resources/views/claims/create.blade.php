@extends('layouts.app')
@section('title', 'แจ้งเคลมสินค้า')
@section('content')
<h1>Product Claim Form</h1>
@if (session('status')) <div class="alert alert-success">{{ session('status') }}</div> @endif
<form method="POST" action="{{ route('claims.store') }}" novalidate>
    @csrf
    <label class="form-label">Serial Number</label>
    <input name="serial_number" value="{{ old('serial_number') }}" class="form-control @error('serial_number') is-invalid @enderror">
    @error('serial_number') <div class="text-danger">{{ $message }}</div> @enderror

    <label class="form-label mt-3">อีเมล</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
    @error('email') <div class="text-danger">{{ $message }}</div> @enderror

    <label class="form-label mt-3">อาการชำรุด</label>
    <textarea name="symptom" class="form-control @error('symptom') is-invalid @enderror">{{ old('symptom') }}</textarea>
    @error('symptom') <div class="text-danger">{{ $message }}</div> @enderror

    <label class="form-label mt-3">ความเร่งด่วน</label>
    <select name="urgency" class="form-select @error('urgency') is-invalid @enderror">
        <option value="low">ต่ำ</option><option value="normal">ปกติ</option><option value="high">เร่งด่วน</option>
    </select>
    @error('urgency') <div class="text-danger">{{ $message }}</div> @enderror
    <button class="btn btn-primary mt-3">ส่งคำขอ</button>
</form>
@endsection
