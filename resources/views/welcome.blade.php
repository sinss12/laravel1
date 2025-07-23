<div class="container">
    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/foto/' . $blog->foto) }}" class="card-img-top" alt="{{ $blog->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->judul }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($blog->konten), 100) }}</p>
                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="custom-pagination d-flex justify-content-center">
        {{ $blogs->links('pagination::bootstrap-4', ['class' => 'pagination']) }}
    </div>
</div>
