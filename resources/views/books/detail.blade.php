@extends('layouts/app')

@section('title', 'Detail ' . $book['title'])


@section('content')
    <div class="card w-75 m-3 p-3 mx-auto">
        @if (session('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>{{ $book['title'] }}</h1>
        <div class="row my-3">
            <div class="col-3">
                <img src="{{ asset('storage/images/' . $book->image_path) }}" alt="" class="card-img">
            </div>
            <div class="col px-4 fs-4">
                <p class="justify">{{ $book['desc'] }}</p>
                <div class="fs-5 my-3">
                    <div class="d-flex gap-5">
                        <p class="text-detail">ISBN : <b>{{ $book['isbn'] }}</b></p>
                        <p>Author : <b>{{ $book['author'] }}</b></p>
                    </div>
                    <div class="d-flex gap-5">
                        <p class="text-detail">Publisher : <b>{{ $book['publisher'] }}</b></p>
                        <p>Category : <b>{{ $book['category']['name'] }}</b></p>
                    </div>
                    <div class="d-flex gap-5">
                        <p class="text-detail">Pages : <b>{{ $book['pages'] }}</b></p>
                        <p>Language : <b>{{ $book['language'] }}</b></p>
                    </div>
                    <div class="d-flex gap-5">
                        <p class="text-detail">Publish Date : <b>{{ $book['publish_date'] }}</b></p>
                        <p>Subjects : <b>{{ $book['subjects'] }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card w-75 m-3 p-3 mx-auto">
        @php
            $bahasa = ['Indonesia', 'Inggris', 'Mandarin', 'Spanyol'];
        @endphp
        <h2>Bahasa Yang Tersedia</h2>
        <ul>
            @foreach ($bahasa as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    <div class="card w-75 m-3 p-3 mx-auto">
        <div>
            @auth <!-- Hanya menampilkan tombol-tombol jika pengguna sudah login -->
                <a href="{{ route('books-index') }}" class="btn btn-outline-secondary me-3">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('books-edit', ['id' => $book['id']]) }}" class="btn btn-outline-success me-3">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
                <a class="btn btn-outline-danger me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-trash"></i> Hapus
                </a>
            @endauth
            @guest <!-- Tombol kembali saja yang ditampilkan jika pengguna belum login -->
                <a href="{{ route('books-index') }}" class="btn btn-outline-secondary me-3">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            @endguest
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus buku ini?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="{{ route('books-delete', ['id' => $book['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
