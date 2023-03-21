@extends('layouts.main')

@section('content')
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-header">
            Лучшая библиотека 
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 50, $end='...') }}</p>
            <a href="{{ route('show', $post->id) }}" class="btn btn-primary">Читать</a>
        </div>
    </div>
    @endforeach
    {{ $posts->withQueryString()->links() }}
@endsection