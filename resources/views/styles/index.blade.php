@extends('layouts.main')

@section('content')
    @if (isset($request->search))
        <h4>Результат поиска по: {{ $request->search }}</h4>
    @endif
    <!-- Вывод всех жанров -->
    @if (count($styles) == 0)
        <h2>К сожалению такого жанра у нас нет!</h2>
    @else
        <div class="card-header">
            Список жанров
        </div>
    @endif

    @foreach ($styles as $style)
    <div class="card mb-3">
        <div class="card-body">
        {{ $style->id }} <a href="{{ route('styles.show', $style->id) }}">{{ $style->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $styles->withQueryString()->links() }}
@endsection