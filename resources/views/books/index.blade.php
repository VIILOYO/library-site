@extends('layouts.main')

@section('content')
    @if (isset($author))
        <h4>Автор: {{ $author->first_name }} {{ $author->last_name }}</h4>
    @elseif (isset($style))
        <h4>Жанр: {{ $style->title }}</h4>
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