<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->judul }} - BlogSans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f3f4f6, #e5e7eb);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
        }

        .hero-detail {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)),
            url('{{ asset("storage/" . $blog->foto) }}') center/cover no-repeat;
            min-height: 60vh;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
            border-radius: 0 0 30px 30px;
        }

        .hero-detail::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(147, 51, 234, 0.1));
            border-radius: 0 0 30px 30px;
            z-index: 1;
        }

        .hero-detail .container {
            position: relative;
            z-index: 2;
        }

        .breadcrumb-custom {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            padding: 8px 20px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .breadcrumb-custom a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb-custom a:hover {
            color: white;
        }

        .article-content {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin-top: -80px;
            position: relative;
            z-index: 3;
        }

        .article-meta {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .meta-item:last-child {
            margin-bottom: 0;
        }

        .meta-item i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .blog-content {
            font-size: 1.1rem;
            color: #374151;
        }

        .blog-content h1,
        .blog-content h2,
        .blog-content h3 {
            color: #1f2937;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .share-section {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            border-radius: 15px;
            padding: 25px;
            margin-top: 40px;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 20px;
            margin: 5px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-facebook {
            background-color: #3b5998;
            color: white;
        }

        .btn-twitter {
            background-color: #1da1f2;
            color: white;
        }

        .btn-whatsapp {
            background-color: #25d366;
            color: white;
        }

        .btn-copy {
            background-color: #6c757d;
            color: white;
        }

        .back-btn {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 1000;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px 25px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            color: white;
        }

        .back-btn i {
            margin-right: 8px;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: #bdc3c7;
            margin-top: 60px;
        }

        .reading-time {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .hero-detail {
                min-height: 50vh;
            }

            .article-content {
                margin-top: -40px;
            }

            .back-btn {
                bottom: 20px;
                left: 20px;
                padding: 12px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blog.index') }}">
                <i class="bi bi-journal-text me-2"></i>BlogSans
            </a>
           
        </div>
    </nav>

    <!-- Hero Detail Section -->
    <section class="hero-detail">
        <div class="container">
            <div class="breadcrumb-custom">
                <a href="{{ route('blog.index') }}">
                    <i class="bi bi-house me-1"></i> Beranda
                </a>
                <span class="mx-2">/</span>
                <span>{{ Str::limit($blog->judul, 30) }}</span>
            </div>
            <h1 class="display-4 fw-bold mb-3">{{ $blog->judul }}</h1>
            <div class="reading-time">
                <i class="bi bi-clock me-1"></i>
                Estimasi baca {{ ceil(str_word_count(strip_tags($blog->konten)) / 200) }} menit
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <div class="container pb-5">
        <div class="article-content p-4 p-md-5">

            <!-- Article Meta -->
            <div class="article-meta">
                <div class="row">
                    <div class="col-md-6">
                        <div class="meta-item">
                            <i class="bi bi-tag"></i>
                            <span>Kategori: {{ $blog->kategori->name ?? 'Umum' }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-calendar3"></i>
                            <span>{{ $blog->created_at->format('d F Y') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="meta-item">
                            <i class="bi bi-clock-history"></i>
                            <span>Dipublikasikan {{ $blog->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-eye"></i>
                            <span>{{ $blogViewsCount }} kali dibaca</span>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Blog Content -->
            <div class="blog-content">
                {!! nl2br($blog->konten) !!}
            </div>

            <!-- Share Section -->
            <div class="share-section">
                <h5 class="mb-3">
                    <i class="bi bi-share me-2"></i>Bagikan Artikel Ini
                </h5>
                <div class="d-flex flex-wrap">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                        target="_blank" class="share-btn btn-facebook">
                        <i class="bi bi-facebook me-2"></i>Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->judul) }}"
                        target="_blank" class="share-btn btn-twitter">
                        <i class="bi bi-twitter me-2"></i>Twitter
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->judul . ' - ' . request()->fullUrl()) }}"
                        target="_blank" class="share-btn btn-whatsapp">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                    <button onclick="copyUrl()" class="share-btn btn-copy">
                        <i class="bi bi-link-45deg me-2"></i>Salin Link
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <a href="{{ route('blog.index') }}" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Beranda
    </a>

    <!-- Footer -->
    <footer class="text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0">&copy; {{ date('Y') }} BlogSans. Semua hak dilindungi.</p>
                    <small class="text-muted">Dibuat dengan ❤️ untuk berbagi inspirasi</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyUrl() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(function() {
                // Create toast notification
                const toast = document.createElement('div');
                toast.className = 'position-fixed top-0 start-50 translate-middle-x mt-3 alert alert-success alert-dismissible fade show';
                toast.style.zIndex = '9999';
                toast.innerHTML = `
                    <i class="bi bi-check-circle me-2"></i>
                    Link berhasil disalin!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(toast);

                // Auto remove after 3 seconds
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 3000);
            }).catch(function() {
                alert('Gagal menyalin link. Silakan salin manual dari address bar.');
            });
        }

        // Smooth scroll for better UX
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling to all links
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>