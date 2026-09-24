@extends('layouts.app')
@section('title', 'แก้ไขสินค้า')
@section('content')
<h1>แก้ไขสินค้า</h1>
<form method="POST" action="{{ route('products.update', $product->id) }}">
    @csrf @method('PUT')
    <input name="name" class="form-control mb-2" value="{{ old('name', $product->name) }}">
    <input name="price" class="form-control mb-2" type="number" step="0.01" value="{{ old('price', $product->price) }}">
    <textarea name="description" class="form-control mb-2">{{ old('description', $product->description) }}</textarea>
    <button class="btn btn-primary">บันทึกการแก้ไข</button>
</form>
@endsection
