@extends('layout.app') {{-- ganti sesuai layout lo --}}

@section('title', 'Edit Kategori')

@section('content')
<div class="container mt-4">
    <h4>Edit Kategori</h4>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" value="{{ $kategori->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ $kategori->slug }}" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
