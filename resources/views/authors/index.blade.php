@extends('layouts.main')

@section('content')
    <div class="card-header">
        Список авторов:
    </div>
    <!-- Вывод всех книг -->
    @foreach ($authors as $author)
    <div class="card mb-3">
        <div class="card-body">
        {{ $author->id }} <a href="{{ route('authors.show', $author->id) }}">{{ $author->first_name }} {{ $author->last_name }}</a>
        </div>
    </div>
    @endforeach
    {{ $authors->withQueryString()->links() }}
@endsection