@extends('layouts.app')
@section('title', 'สินค้า')
@section('content')
<h1>จัดการสินค้า</h1>
@if (session('status')) <div class="alert alert-success">{{ session('status') }}</div> @endif
<form method="POST" action="{{ route('products.store') }}" class="card card-body mb-4">
    @csrf
    <input name="name" class="form-control mb-2" placeholder="ชื่อสินค้า">
    <input name="price" class="form-control mb-2" type="number" step="0.01" placeholder="ราคา">
    <textarea name="description" class="form-control mb-2" placeholder="รายละเอียด"></textarea>
    <button class="btn btn-primary">เพิ่มสินค้า</button>
</form>
<table class="table table-striped">
<thead><tr><th>ชื่อ</th><th>ราคา</th><th>สถานะ</th><th>จัดการ</th></tr></thead>
<tbody>
@forelse ($products as $product)
<tr>
    <td>{{ $product->name }}</td><td>{{ number_format($product->price, 2) }}</td>
    <td>{{ $product->status ? 'พร้อมขาย' : 'ระงับการขาย' }}</td>
    <td><a href="{{ route('products.change', $product->id) }}">สลับสถานะ</a> | <a href="{{ route('products.edit', $product->id) }}">แก้ไข</a></td>
</tr>
@empty <tr><td colspan="4">ไม่มีสินค้า</td></tr>
@endforelse
</tbody></table>
@endsection
