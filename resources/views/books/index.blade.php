@extends('layouts/app')
@section('title', 'Timedoor Library')

@section('content')

    <div class="card w-75 my-3 rounded mx-auto p-3">
        @if (session('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between w-full align-items-center mx-5">
            <h1>Daftar Buku Timedoor Library</h1>
            <a class="btn btn-outline-success" href="{{ route('books-tambah') }}">Tambah</a>
        </div>
        <div class="d-flex  w-full mx-5">
            <form action="{{ route('books-index') }}">
                <div class="d-flex gap-4">
                    <input class="form-control" type="text" name="search" placeholder="Cari Data">
                    <button type="submit" class="btn btn-outline-success">Filter</button>
                </div>
            </form>
        </div>
        <div class="container d-flex flex-wrap justify-content-center gap-4 my-3">
            @foreach ($books as $book)
                <div class="card mx-2 mb-3" style="width: 18rem;">
                    <img src="{{ asset('storage/images/' . $book->image_path) }}" class="card-img-top"
                        alt="{{ $book['title'] }} Cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['title'] }}</h5>
                        <p class="card-text fs-6">{{ $book['short_desc'] }}</p>

                    </div>
                    <div class="text-center my-3">
                        <a href="{{ route('books-detail', ['id' => $book['id']]) }}"
                            class="btn btn-outline-primary text-center"><i class="fa-regular fa-eye"></i> View
                            Detail </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div>
            <div class="page p-2 text-center justify-content-center">
                {!! $books->links() !!}
            </div>
        </div>
    </div>
@endsection
