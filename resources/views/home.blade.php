@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }@extends('layout.app')

@section('title', 'Blog Saya')

@section('content')
<style>
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .blog-image-wrapper {
        overflow: hidden;
        height: 220px;
    }

    .blog-image-wrapper img {
        transition: transform 0.4s ease-in-out;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .blog-card:hover .blog-image-wrapper img {
        transform: scale(1.1);
    }

    .card-title {
        transition: color 0.3s ease;
    }

    .card-title:hover {
        color: #0056b3;
    }
</style>

<div class="container" style="max-width: 1140px">
    <!-- Header -->
    <div class="bg-white rounded-lg p-4 shadow-sm mb-4 text-center">
        <h2 class="text-3xl fw-bold text-secondary mb-1">
            <i class="typcn typcn-news icon-md"></i> Blog & Berita
        </h2>
        <p class="text-muted">Temukan berita dan tulisan menarik terbaru dari kami.</p>
    </div>

    <!-- Blog Cards -->
    <div class="row justify-content-center">
        @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card blog-card border-0 shadow-sm rounded-4 overflow-hidden w-100">
                    <div class="blog-image-wrapper">
                        <img src="https://source.unsplash.com/600x400/?news,technology,{{ $i }}" class="card-img-top" alt="Berita {{ $i }}">
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-2 small d-flex justify-content-between align-items-center">
                            <span class="badge bg-light bg-opacity-10 text-secondary px-2 py-1 rounded-pill">
                                <i class="typcn typcn-tag me-1"></i> Kategori
                            </span>
                            <span class="text-muted">
                                <i class="typcn typcn-time"></i> {{ \Carbon\Carbon::now()->format('d M Y') }}
                            </span>
                        </div>
                        <h5 class="card-title text-dark fw-bold mt-2">Judul Berita Menarik Ke-{{ $i }}</h5>
                        <p class="card-text text-muted flex-grow-1">
                            Ini adalah ringkasan dari berita atau artikel ke-{{ $i }} yang membahas hal-hal penting dan menarik untuk dibaca.
                        </p>
                        <a href="#" class="btn btn-sm btn-outline-secondary mt-3 align-self-start">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

@include('layout._partials.footer')
@endsection
}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
