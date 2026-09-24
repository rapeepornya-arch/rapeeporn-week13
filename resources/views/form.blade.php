@extends('layouts.app')
@section('title', 'เขียนบทความ')
@section('content')
<h1 class="text-center py-2">เขียนบทความใหม่</h1>
<form method="POST" action="{{ route('blog.store') }}" class="card card-body">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">ชื่อบทความ</label>
        <input id="title" type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">เนื้อหา</label>
        <textarea id="content" name="content" rows="5" class="form-control"></textarea>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">บันทึก</button>
        <a href="{{ route('blog') }}" class="btn btn-success">บทความทั้งหมด</a>
    </div>
</form>
@endsection
