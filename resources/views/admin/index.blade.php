@extends('layouts.admin')

@section('content')
    @if (isset($author))
        <h4>Автор: {{ $author->first_name }} {{ $author->last_name }}</h4>
    @endif
    <!-- Вывод всех книг -->
    <div class="card-header">
        Список книг
    </div>
    @foreach ($books as $book)
    <div class="card mb-3">
        <div class="card-body">
        {{ $book->id }} <a href="{{ route('admin.show', $book->id) }}">{{ $book->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $books->withQueryString()->links() }}
@endsection