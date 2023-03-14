@extends('layouts.main')

@section('content')
    <!-- Вывод всех постов -->
    @foreach ($books as $book)
    <div class="card mb-3">
        <div class="card-body">
        {{ $book->id }} <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $books->withQueryString()->links() }}
@endsection