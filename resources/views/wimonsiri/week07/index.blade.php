@extends('layouts.app')

@section('title', 'งานเดิม Week 7 - บทความ')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <p class="text-uppercase small text-muted mb-1">Wimonsiri · Week 7 Original</p>
        <h1 class="h2 mb-1">รายการบทความทั้งหมด</h1>
        <p class="text-muted mb-0">งานจากโปรเจกต์เดิมที่นำมาต่อยอดในสัปดาห์ถัดไป</p>
    </div>
    <span class="badge text-bg-dark fs-6">{{ $blogs->total() }} รายการ</span>
</div>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr><th>#</th><th>หัวข้อ</th><th>เนื้อหา</th><th>สถานะ</th><th>วันที่สร้าง</th></tr>
            </thead>
            <tbody>
            @forelse ($blogs as $blog)
                <tr>
                    <td>{{ $blogs->firstItem() + $loop->index }}</td>
                    <td class="fw-semibold">{{ $blog->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($blog->content, 100) }}</td>
                    <td><span class="badge {{ $blog->status ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $blog->status ? 'เผยแพร่' : 'ฉบับร่าง' }}</span></td>
                    <td>{{ optional($blog->created_at)->format('d/m/Y') ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-5">ยังไม่มีข้อมูลบทความ</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-4">{{ $blogs->links('pagination::bootstrap-5') }}</div>
@endsection