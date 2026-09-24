@extends('layouts.app')
@section('title', 'จัดการบทความ')
@section('content')
<h1>จัดการบทความด้วย Query Builder</h1>
@if (session('status')) <div class="alert alert-success">{{ session('status') }}</div> @endif
<form method="POST" action="{{ route('blog.store') }}" class="card card-body mb-4">
    @csrf
    <input name="title" value="{{ old('title') }}" class="form-control mb-2" placeholder="หัวข้อ">
    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
    <textarea name="content" class="form-control mb-2" placeholder="เนื้อหา">{{ old('content') }}</textarea>
    @error('content') <div class="text-danger">{{ $message }}</div> @enderror
    <button class="btn btn-primary">เพิ่มบทความ</button>
</form>
@forelse ($blogs as $blog)
    <article class="card mb-3"><div class="card-body">
        <h2 class="h5">{{ $blog->title }}</h2>
        <p>{{ \Illuminate\Support\Str::limit($blog->content, 120) }}</p>
        <form method="POST" action="{{ route('blog.delete', $blog->id) }}" onsubmit="return confirm('ยืนยันการลบ?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">ลบ</button>
        </form>
    </div></article>
@empty
    <p class="text-muted">ไม่มีบทความ</p>
@endforelse
{{ $blogs->links() }}
@endsection
