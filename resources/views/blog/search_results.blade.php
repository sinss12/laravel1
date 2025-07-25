<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - BlogSans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f3f4f6, #e5e7eb);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') center/cover no-repeat;
            position: relative;
            color: white;
            border-radius: 0 0 20px 20px;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 0;
        }

        .hero .container {
            position: relative;
            z-index: 1;
        }

        .blog-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
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

        .badge-kategori {
            background-color: #f0f0f0;
            color: #555;
            font-size: 0.75rem;
            padding: 5px 10px;
            border-radius: 50px;
        }

        footer {
            background-color: #222;
            color: #bbb;
            font-size: 0.875rem;
        }

        .btn-outline-primary {
            border-radius: 50px;
        }
    </style>
</head>

<body>

    <body style="padding-top: 55px;"> <!-- Nambahin padding biar hero ga ketutup navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="{{ route('blog.index') }}">
                    <i class="bi bi-journal-text me-2"></i>BlogSans
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Kiri: Home + Filter -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
                        <!-- Home -->
                        <li class="nav-item me-2">
                            <a class="nav-link btn btn-outline-light" href="{{ route('blog.index') }}">
                                <i class="bi bi-house-door me-1"></i> Home
                            </a>
                        </li>

                        <!-- Filter Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-light d-flex align-items-center"
                                href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="me-1" viewBox="0 0 24 24">
                                    <path
                                        d="M19 6h-14c-1.1 0-1.4.6-.6 1.4l4.2 4.2c.8.8 1.4 2.3 1.4 3.4v5l4-2v-3.5c0-.8.6-2.1 1.4-2.9l4.2-4.2c.8-.8.5-1.4-.6-1.4z" />
                                </svg>
                                Filter
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
                                <li><a class="dropdown-item" href="{{ route('blog.index') }}">Semua</a></li>
                                <li><a class="dropdown-item" href="{{ route('blog.teknologi') }}">Teknologi</a></li>
                                <li><a class="dropdown-item" href="{{ route('blog.sport') }}">Sport</a></li>
                                <li><a class="dropdown-item" href="{{ route('blog.otomotif') }}">Otomotif</a></li>
                                <li><a class="dropdown-item" href="{{ route('blog.politik') }}">Politik</a></li>
                                <li><a class="dropdown-item" href="{{ route('blog.hiburan') }}">Hiburan</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Kanan: Pencarian -->
                    <form action="{{ route('blog.search') }}" method="GET" class="d-flex ms-auto">
                        <input type="text" name="search" class="form-control me-2"
                            placeholder="Cari artikel atau kategori..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-light">Cari</button>
                    </form>
                </div>
            </div>
        </nav>

    <!-- Hero untuk hasil pencarian -->
    <section class="hero text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Hasil Pencarian</h1>
            <p class="lead">Menampilkan artikel untuk: <strong>{{ request('search') }}</strong></p>
        </div>
    </section>

    <!-- Blog Result Section -->
    <div class="container py-5">
        @if($blog->count())
        <div class="row">
            @foreach ($blog as $item)
            <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card blog-card border-0 shadow-sm rounded-4 w-100">
                    <div class="blog-image-wrapper">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}">
                    </div>
                    <div class="card-body d-flex flex-column p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge-kategori">
                                <i class="typcn typcn-tag me-1"></i> {{ $item->kategori->nama ?? 'Umum' }}
                            </span>
                            <small class="text-muted">
                                <i class="typcn typcn-time"></i> {{ $item->created_at->format('d M Y') }}
                            </small>
                        </div>
                        <h5 class="card-title fw-bold text-dark">{{ Str::limit($item->judul, 50) }}</h5>
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit(strip_tags($item->konten), 100) }}
                        </p>
                        <a href="{{ route('blog.show', $item->id) }}" class="btn btn-sm btn-outline-primary mt-3">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="col-12 text-center">
            <p class="text-muted">Tidak ditemukan artikel dengan kata kunci <strong>"{{ request('search') }}"</strong>.</p>
        </div>
        @endif

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $blog->appends(request()->input())->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3 mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} MyBlog. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
</body>

</html>