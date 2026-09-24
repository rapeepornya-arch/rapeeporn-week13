@extends('layouts.app')
@section('title', 'เพิ่มหนังสือ')
@section('content')
<h1>แบบฟอร์มเพิ่มหนังสือ</h1>
<form method="POST" action="{{ route('books.store') }}" class="card card-body">
    @csrf
    <div class="mb-3">
        <label for="book-title" class="form-label">ชื่อหนังสือ</label>
        <input id="book-title" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">ผู้แต่ง</label>
        <input id="author" name="author" class="form-control">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">ราคา</label>
        <input id="price" type="number" name="price" min="0" class="form-control">
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary">บันทึกข้อมูล</button>
        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">กลับไปรายชื่อหนังสือ</a>
    </div>
</form>
@endsection
