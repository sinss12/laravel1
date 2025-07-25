<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('blog.index') }}">
            <i class="bi bi-journal-text me-2"></i>BlogSans
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Kiri: Home + Filter -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
                <!-- Home -->
                <li class="nav-item me-2">
                    <a class="nav-link btn btn-outline-light" href="{{ route('blog.index') }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>

                <!-- Filter -->
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

            <!-- Kanan: Search -->
            <form action="{{ route('blog.search') }}" method="GET" class="d-flex ms-auto">
                <input type="text" name="search" class="form-control me-2"
                    placeholder="Cari artikel atau kategori..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-light">Cari</button>
            </form>
        </div>
    </div>
</nav>
