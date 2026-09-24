@extends('layouts.app')

@section('title', 'งานเดิม Week 7 - บทความจาก Array')

@section('content')
<p class="text-uppercase small text-muted">Week 7 Original</p>
<h1 class="h2 mb-4">บทความจาก Array</h1>
<div class="row g-3">
@foreach ($blogs as $item)
    <div class="col-md-4"><article class="card h-100 border-0 shadow-sm"><div class="card-body">
        <span class="badge {{ $item['status'] ? 'text-bg-success' : 'text-bg-secondary' }} mb-3">{{ $item['status'] ? 'เผยแพร่' : 'ไม่เผยแพร่' }}</span>
        <h2 class="h5">{{ $item['title'] }}</h2><p class="text-muted mb-0">{{ $item['content'] }}</p>
    </div></article></div>
@endforeach
</div>
@endsection