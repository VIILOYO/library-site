@extends('layouts.main')

@section('content')
    @if (isset($request->search))
        <h4>Результат поиска по: {{ $request->search }}</h4>
        <hr>
    @endif
    <!-- Вывод всех авторов -->
    @if (count($authors) == 0)
        <h2>К сожалению такого автора у нас нет!</h2>
    @else
        <div class="card-header">
            Список авторов
        </div>
    @endif

    @foreach ($authors as $author)
    <div class="card mb-3">
        <div class="card-body">
        {{ $author->id }} <a href="{{ route('authors.show', $author->id) }}">{{ $author->first_name }} {{ $author->last_name }}</a>
        </div>
    </div>
    @endforeach
    {{ $authors->withQueryString()->links() }}
@endsection