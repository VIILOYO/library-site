@extends('layouts.main')

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $book->image }}" class="img-fluid rounded-start" alt="Обложка">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <small class="text-muted">
                    Жанр: <a href="{{ route('styles.show', $book->style->id) }}">{{ $book->style->title }}</a>
                </small>
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->description }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        Автор: <a href="{{ route('authors.show', $book->author->id) }}">{{ $book->author->first_name }} {{ $book->author->last_name }}</a>
                    </small>
                </p>
                @auth()
                    @if(auth()->user()->books->contains($book))
                        <form action="{{ route('books.unfavorite', [$book->id]) }}" method="get">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Убрать из избранного</button>
                        </form>
                    @else()
                        <form action="{{ route('books.favorite', [$book->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-light">Изранное</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection