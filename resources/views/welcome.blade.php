@extends('layout')
@section('content')
<div class="container d-flex flex-wrap justify-content-center gap-4 my-3">
    @foreach ($books as $book)      
        <div class="card mx-2 mb-3" style="width: 18rem;">
            <img src="{{$book['image']}}" class="card-img-top" alt="{{ $book['title'] }} Cover" >
            <div class="card-body">
                <h5 class="card-title">{{$book['title']}}</h5>
                <p class="card-text fs-6">{{$book['short_desc']}}</p>
                
            </div>
            <div class="text-center my-3">
                <a href="{{ route('books-detail', ['id' => $book['id'], 'title' => $book['title']]) }}" class="btn btn-outline-secondary text-center">View Detail</a>
            </div>
        </div>
    @endforeach
</div>
@endsection