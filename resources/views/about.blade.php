@extends('layouts.app')
@section('title', 'เกี่ยวกับเรา')
@section('content')
<h1>เกี่ยวกับเรา</h1>
<div class="card"><div class="card-body">
    <p><strong>นักศึกษา:</strong> {{ $name }}</p>
    <p><strong>วันที่:</strong> {{ $data }}</p>
</div></div>
@endsection
