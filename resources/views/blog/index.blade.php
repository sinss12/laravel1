@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-light text-dark d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Daftar Blog</h5>
            <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                    <div class="mb-3 mb-xl-0 pr-1">
                        <div class="dropdown">
                            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <h6 class="dropdown-header">Last 14 days</h6>
                                <a class="dropdown-item" href="#">Last 21 days</a>
                                <a class="dropdown-item" href="#">Last 28 days</a>
                            </div>
                        </div>
                    </div>
                    <div class="pr-1 mb-3 mr-2 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                            <i class="typcn typcn-arrow-forward-outline mr-2"></i>Export
                        </button>
                    </div>
                    <a href="{{ url('/blog/create') }}" class="btn btn-info btn-sm">
                        ＋ Tambah Blog
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Konten</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Dibuat Oleh</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blog as $b)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($b->konten, 100) }}</td>
                            <td class="text-center">
                                @if ($b->foto)
                                <img src="{{ asset('storage/' . $b->foto) }}" alt="Foto" width="80" class="img-thumbnail">
                                @else
                                <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $b->kategori->name ?? 'Tidak Ada' }}
                            </td>
                            <td class="text-center">
                                {{ $b->creator->name ?? 'Tidak Diketahui' }}
                            </td>
                            <td class="text-center actions-cell" style="white-space: nowrap;">
                                <a href="{{ route('blog.edit', $b->id) }}" class="btn btn-sm btn-success me-2">
                                    <i class="typcn typcn-edit"></i> Edit
                                </a>
                                <form action="{{ route('blog.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus blog ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="typcn typcn-delete"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada blog</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layout._partials.footer')
@endsection