@extends('layouts.admin')

@section('content')
    <!-- Вывод всех авторов -->
    <div class="card-header">
        Список постов
    </div>
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
        {{ $post->id }} <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
        </div>
    </div>
    @endforeach
    {{ $posts->withQueryString()->links() }}
@endsection