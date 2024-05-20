@extends('layouts/app')
@section('title', 'Edit Buku')

@section('content')
    <form action="{{ route('books-put', ['id' => $book['id']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card w-75 m-3 p-3 mx-auto">
            <h1 class="mt-3 mb-5">Edit Buku {{ $book['title'] }}</h1>
            <div class="mb-4 d-flex align-items-center">
                <label for="isbn" class="form-label me-3 w-input fs-5">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN"
                    value="{{ $book['isbn'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="title" class="form-label me-3 w-input fs-5">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                    value="{{ $book['title'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="author" class="form-label me-3 w-input fs-5">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Author"
                    value="{{ $book['author'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="publisher" class="form-label me-3 w-input fs-5">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher"
                    value="{{ $book['publisher'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="id_category" class="form-label me-3 w-input fs-5">Category</label>
                <select class="form-select" name="id_category" value="{{ old('id_category') }}">
                    <option value="" selected disabled>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            {{ $book['id_category'] == $category['id'] ? 'selected' : '' }}>
                            {{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="pages" class="form-label me-3 w-input fs-5">Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" placeholder="Pages"
                    value="{{ $book['pages'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="publish_date" class="form-label me-3 w-input fs-5">Publish Date</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" placeholder="Publish Date"
                    value="{{ $book['publish_date'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="subjects" class="form-label me-3 w-input fs-5">Subject</label>
                <input type="text" class="form-control" id="subjects" name="subjects" placeholder="Subject"
                    value="{{ $book['subjects'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="image" class="form-label me-3 w-input fs-5">Image Cover</label>
                <input type="file" class="form-control" id="image" name="image_path" placeholder="Image Cover">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="language" class="form-label me-3 w-input fs-5">Language</label>
                <input type="text" class="form-control" id="language" name="language" placeholder="Language"
                    value="{{ $book['language'] }}">
            </div>
            <div class="mb-4 d-flex align-items-center">
                <label for="desc" class="form-label fs-5 me-3">Description</label>
                <textarea class="form-control" id="desc" rows="5" name="desc">{{ $book['desc'] }}</textarea>

            </div>
        </div>
        <div class="card w-75 m-3 p-3 mx-auto">
            <div>
                <a href={{ route('books-detail', ['id' => $book['id']]) }} class="btn btn-outline-secondary me-3"><i
                        class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-outline-success"><i class="fa-regular fa-floppy-disk"></i>
                    Simpan</button>
            </div>
        </div>
    </form>

@endsection
