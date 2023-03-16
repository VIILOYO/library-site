@extends('layouts.admin')

@section('content')
    <!-- Вывод всех авторов -->
    <div class="card-header">
        Список жанров
    </div>
    @foreach ($styles as $style)
    <div class="card mb-3">
        <div class="card-body">
        {{ $style->id }} <a href="{{ route('admin.styles.show', $style) }}">{{ $style->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $styles->withQueryString()->links() }}
@endsection