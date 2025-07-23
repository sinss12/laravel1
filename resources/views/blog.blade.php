@extends('layout.app')

@section('title', 'Blog Kami')

@section('content')
<style>
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .blog-image-wrapper {
        overflow: hidden;
        height: 230px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .blog-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .blog-card:hover .blog-image-wrapper img {
        transform: scale(1.08);
    }

    .card-title:hover {
        color: #0d6efd;
    }

    .badge-kategori {
        background-color: #f0f0f0;
        color: #555;
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 50px;
    }
</style>

<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-secondary">
            <i class="typcn typcn-news icon-md"></i> Blog & Berita Terkini
        </h2>
        <p class="text-muted">Temukan informasi terbaru seputar topik menarik yang kami sajikan.</p>
    </div>

    <div class="row">
        @forelse ($blogs as $blog)
        <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
            <div class="card blog-card border-0 shadow-sm rounded-4 w-100">
                <div class="blog-image-wrapper">
                    <img src="{{ asset('storage/' . $blog->foto) }}" alt="{{ $blog->judul }}">
                </div>
                <div class="card-body d-flex flex-column p-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge-kategori">
                            <i class="typcn typcn-tag me-1"></i> {{ $blog->kategori->nama ?? 'Umum' }}
                        </span>
                        <small class="text-muted">
                            <i class="typcn typcn-time"></i>
                            {{ $blog->created_at->format('d M Y') }}
                        </small>
                    </div>
                    <h5 class="card-title fw-bold text-dark">{{ Str::limit($blog->judul, 50) }}</h5>
                    <p class="card-text text-muted flex-grow-1">
                        {{ Str::limit(strip_tags($blog->konten), 100) }}
                    </p>
                    <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-sm btn-outline-primary mt-3">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada blog yang dipublikasikan.</p>
        </div>
        @endforelse
    </div>
</div>

@include('layout._partials.footer')
@endsection
