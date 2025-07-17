@extends('layout.app')

@section('title', 'Tambah User')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">＋ Tambah User</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('user.form')
            </form>
        </div>
    </div>
</div>
@endsection
