@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Tambah Blog</h5>
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

            <form action="{{ route('blog.store') }}" method="POST">
                @csrf
                @include('blog.form')
            </form>
        </div>
    </div>
</div>
@endsection
