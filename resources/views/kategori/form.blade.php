@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-light text-dark d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Kategori</h5>
            <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary">
                ← Kembali
            </a>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="typcn typcn-plus"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

@include('layout._partials.footer')
@endsection
