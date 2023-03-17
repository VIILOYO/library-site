@extends('layouts.main')

@section('content')
    <div class="card-header">
        Список жанром
    </div>
    <!-- Вывод всех книг -->
    @foreach ($styles as $style)
    <div class="card mb-3">
        <div class="card-body">
        {{ $style->id }} <a href="{{ route('styles.show', $style->id) }}">{{ $style->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $styles->withQueryString()->links() }}
@endsection