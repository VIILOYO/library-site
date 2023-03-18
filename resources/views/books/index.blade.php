@extends('layouts.main')

@section('content')
    @if (isset($author))
        <h4>Автор: {{ $author->first_name }} {{ $author->last_name }}</h4>
    @elseif (isset($style))
        <h4>Жанр: {{ $style->title }}</h4>
    @endif

    @if (isset($authors) && count($authors) !== 0)
        <div class="card" style="width: 18rem;">
            <li class="list-group-item">Авторы:</li>
            <ul class="list-group list-group-flush">
                @foreach ($authors as $author)
                    <li class="list-group-item"><a href="{{ route('authors.show', $author->id) }}">{{ $author->first_name }} {{ $author->last_name }}</a></li>
                @endforeach
            </ul>
    </div>
    <hr>
    @endif
    <div class="card-header">
        Список книг
    </div>
    <!-- Вывод всех книг -->
    @foreach ($books as $book)
    <div class="card mb-3">
        <div class="card-body">
        {{ $book->id }} <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $books->withQueryString()->links() }}
@endsection