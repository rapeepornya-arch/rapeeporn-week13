@extends('layouts.app')
@section('title', 'รายชื่อหนังสือ')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>รายชื่อหนังสือ</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">เพิ่มหนังสือ</a>
</div>
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover align-middle">
        <thead><tr><th>ชื่อหนังสือ</th><th>ผู้แต่ง</th><th>ราคา</th><th>สถานะ</th></tr></thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book['title'] }}</td>
                <td>{{ $book['author'] }}</td>
                <td>{{ number_format($book['price'], 2) }} บาท</td>
                <td>
                    @if ($book['available'])
                        <span class="badge text-bg-success">พร้อมจำหน่าย</span>
                    @else
                        <span class="badge text-bg-secondary">สินค้าหมด</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
