@extends('layouts.main')

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $book->image }}" class="img-fluid rounded-start" alt="Обложка">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->description }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        Автор: <a href="{{ route('books.authors.index', $book->author->id) }}">{{ $book->author->first_name }} {{ $book->author->last_name }}</a>
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection