@extends('layouts.admin')

@section('content')
    <!-- Вывод всех авторов -->
    <div class="card-header">
        Список авторов
    </div>
    @foreach ($authors as $author)
    <div class="card mb-3">
        <div class="card-body">
        {{ $author->id }} <a href="{{ route('admin.authors.show', $author) }}">{{ $author->first_name }} {{ $author->last_name }}</a>
        </div>
    </div>
    @endforeach
    {{ $authors->withQueryString()->links() }}
@endsection