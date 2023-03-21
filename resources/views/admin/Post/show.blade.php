@extends('layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <small>
                    {{ $post->created_at }}
                </small>
                </p>
                <form action="{{ route('admin.posts.edit', $post->id) }}" method="get" style="float: left;">
                    @csrf
                    <button type="submit" class="btn btn-success">Редактировать</button>
                </form>

                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection