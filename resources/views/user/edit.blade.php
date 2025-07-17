@extends('layout.app')

@section('title', 'Edit User')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-white d-flex align-items-center">
            <i class="typcn typcn-edit me-2"></i>
            <h5 class="mb-0">Edit User</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>⚠️ Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ url('/user/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    @if ($user->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto" width="100">
                        </div>
                    @endif
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-info">
                        <i class="typcn typcn-tick"></i> Simpan Perubahan
                    </button>
                    <a href="{{ url('/user') }}" class="btn btn-light ms-2">
                        <i class="typcn typcn-arrow-back"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
