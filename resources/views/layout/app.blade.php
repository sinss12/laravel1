<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'CelestialUI Admin')</title>
    
    <!-- base:css -->
    <link rel="stylesheet" href="{{ url('assets/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/typicons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    
    <!-- CDN fallback for typicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" />
    
    <!-- Additional styles -->
    @stack('styles')
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

    @push('styles')
<style>
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
    }

    .blog-image-wrapper {
        position: relative;
        overflow: hidden;
    }

    .blog-image-wrapper img {
        transition: transform 0.5s ease;
        width: 100%;
        object-fit: cover;
        height: 230px;
    }

    .blog-card:hover .blog-image-wrapper img {
        transform: scale(1.05);
    }

    .blog-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.3));
        z-index: 1;
    }

    .card-body {
        position: relative;
        z-index: 2;
        background-color: #fff;
    }

    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }
</style>
@endpush

</head>

<body>
    <div class="container-scroller">
        <!-- Navigation -->
        @include('layout._partials.navbar')
        
        <div class="container-fluid page-body-wrapper">
            <!-- Settings Panel -->
            @include('layout._partials.settings-panel')
            
            <!-- Sidebar -->
            @include('layout._partials.sidebar')
            
            <!-- Main Content -->
             <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
             </div>
         
        </div>
    </div>

    <!-- Base Scripts -->
    <script src="{{ url('assets/js/vendor.bundle.base.js') }}"></script>
    
    <!-- Plugin scripts -->
    <script src="{{ url('assets/js/progressbar.min.js') }}"></script>
    <script src="{{ url('assets/js/Chart.min.js') }}"></script>
    
    <!-- Template scripts -->
    <script src="{{ url('assets/js/off-canvas.js') }}"></script>
    <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('assets/js/template.js') }}"></script>
    <script src="{{ url('assets/js/settings.js') }}"></script>
    <script src="{{ url('assets/js/todolist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Page specific scripts -->
    @stack('scripts')
</body>

</html>