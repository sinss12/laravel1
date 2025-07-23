{{-- resources/views/home/teknologi.blade.php --}}
@extends('layouts.app')

@section('title', 'Blog ' . $kategori)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary">
                    <i class="fas fa-microchip me-2"></i>
                    {{ $kategori }}
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active">{{ $kategori }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="row">
        @forelse($blog as $item)
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
                @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                @endif
                
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="badge bg-primary">{{ ucfirst($item->kategori->name ?? 'Umum') }}</span>
                        <small class="text-muted ms-2">
                            <i class="fas fa-calendar me-1"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </small>
                    </div>
                    
                    <h5 class="card-title">
                        <a href="{{ route('blog.show', $item->id) }}" class="text-decoration-none text-dark">
                            {{ $item->judul }}
                        </a>
                    </h5>
                    
                    <p class="card-text text-muted flex-grow-1">
                        {{ Str::limit(strip_tags($item->konten), 100) }}
                    </p>
                    
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-user me-1"></i>
                                {{ $item->penulis ?? 'Admin' }}
                            </small>
                            <a href="{{ route('blog.show', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Belum Ada Artikel</h4>
                <p class="text-muted">Artikel untuk kategori {{ $kategori }} belum tersedia.</p>
                <a href="{{ route('blog.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-1"></i>
                    Kembali ke Semua Artikel
                </a>
            </div>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($blog->hasPages())
    <div class="row">
        <div class="col-12">
            <nav class="d-flex justify-content-center">
                {{ $blog->links() }}
            </nav>
        </div>
    </div>
    @endif
</div>
@endsection