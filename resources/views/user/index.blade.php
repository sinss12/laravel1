@extends('layout.app')

@section('title', 'Manajemen User')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center bg-black text-white">
            <a href="{{ url('/user') }}" class="nav-link d-flex align-items-center">
                <i class="typcn typcn-group menu-icon me-2"></i>
                <span class="menu-title">User</span>
            </a>

            <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                    <div class="mb-3 mb-xl-0 pr-1">
                        <div class="dropdown">
                            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                                <h6 class="dropdown-header">Last 14 days</h6>
                                <a class="dropdown-item" href="#">Last 21 days</a>
                                <a class="dropdown-item" href="#">Last 28 days</a>
                            </div>
                        </div>
                    </div>
                    <div class="pr-1 mb-3 mr-2 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
                    </div>

                    <a href="{{ url('/user/create') }}" class="btn btn-info btn-sm">
                        ＋ Tambah User
                    </a>


                </div>
            </div>



        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Alamat</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>

                            <td class="text-center">{{ $user->jenis_kelamin ?? '-' }}</td>
                            <td class="text-center">
                                @if(!empty($user->foto))
                                <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto" width="50" class="rounded-circle">
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $user->alamat ?? '-' }}</td>
                            <td class="text-center">
                                <span class="badge ">{{ $user->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="text-center actions-cell" style="white-space: nowrap;">
                                <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-sm btn-success">
                                    <i class="typcn typcn-edit"></i> Edit
                                </a>
                                <form action="{{ url('/user/' . $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                    style="display:inline-block; margin-left: 1rem; margin-bottom: 0;">
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
                            <td colspan="8" class="text-center text-muted">Tidak ada data user.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
@include('layout._partials.footer')
@endsection