
@extends('layout.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Blog</h5>
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

            <form action="{{ route('blog.update', $blog->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('blog.form')
            </form>
        </div>
    </div>
</div>
@endsection