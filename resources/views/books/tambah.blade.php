@extends('layouts/app')
@section('title', 'Tambah Buku')

@section('content')
    <form action="{{ route('books-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card w-75 m-3 p-3 mx-auto">
            <h1 class="mt-3 mb-5">Tambah Buku Baru</h1>
            <div class="d-flex align-items-center">
                <label for="isbn" class="form-label me-3 w-input fs-5">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN"
                    value="{{ old('isbn') }}">
            </div>
            <div class="mb-4">
                @error('isbn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="title" class="form-label me-3 w-input fs-5">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                    value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="author" class="form-label me-3 w-input fs-5">Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Author"
                    value="{{ old('author') }}">
            </div>
            <div class="mb-4">
                @error('author')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="publisher" class="form-label me-3 w-input fs-5">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher"
                    value="{{ old('publisher') }}">
            </div>
            <div class="mb-4">
                @error('publisher')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="id_category" class="form-label me-3 w-input fs-5">Category</label>
                <select class="form-select" name="id_category" value="{{ old('id_category') }}">
                    <option value="" selected disabled>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-4">
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="pages" class="form-label me-3 w-input fs-5">Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" placeholder="Pages"
                    value="{{ old('pages') }}">
            </div>
            <div class="mb-4">
                @error('pages')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="publish_date" class="form-label me-3 w-input fs-5">Publish Date</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" placeholder="Publish Date"
                    value="{{ old('publish_date') }}">
            </div>
            <div class="mb-4">
                @error('publish_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="subjects" class="form-label me-3 w-input fs-5">Subject</label>
                <input type="text" class="form-control" id="subjects" name="subjects" placeholder="Subjects"
                    value="{{ old('subjects') }}">
            </div>
            <div class="mb-4">
                @error('subjects')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="image_path" class="form-label me-3 w-input fs-5">Image Cover</label>
                <input type="file" class="form-control" id="image_path" name="image_path" placeholder="Image Cover"
                    value="{{ old('image_path') }}">
            </div>
            <div class="mb-4">
                @error('image_path')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="language" class="form-label me-3 w-input fs-5">Language</label>
                <input type="text" class="form-control" id="language" name="language" placeholder="Language"
                    value="{{ old('language') }}">
            </div>
            <div class="mb-4">
                @error('language')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex align-items-center">
                <label for="desc" class="form-label fs-5 me-3">Description</label>
                <textarea class="form-control" id="desc" rows="5" name="desc">{{ old('desc') }}</textarea>
            </div>
            <div class="mb-4">
                @error('desc')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="card w-75 m-3 p-3 mx-auto">
            <div>
                <a href={{ route('books-index') }} class="btn btn-outline-secondary me-3"><i
                        class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-outline-success"><i class="fa-regular fa-floppy-disk"></i>
                    Simpan</button>
            </div>
        </div>
    </form>

@endsection
