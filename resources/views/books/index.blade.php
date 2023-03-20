@extends('layouts.main')

@section('content')
    @if (isset($request->search))
        <h4>Результат поиска по: {{ $request->search }}</h4>
    @endif
    <!-- Вывод всех книг -->
    @if (count($books) == 0)
        <h2>К сожалению таких книг у нас нет!</h2>
    @else
        <div class="card-header">
            Список книг
        </div>
    @endif

    @foreach ($books as $book)
    <div class="card mb-3">
        <div class="card-body">
        {{ $book->id }} <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $books->withQueryString()->links() }}
@endsection