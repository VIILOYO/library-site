@extends('layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset($book->image) }}" width="480" height="640" class="img-fluid rounded-start" alt="Обложка">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <small class="text-muted">
                    Жанр: <a href="{{ route('admin.styles.show', $book->style->id) }}">{{ $book->style->title }}</a>
                </small>
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->description }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        Автор: <a href="{{ route('admin.authors.show', $book->author->id) }}">{{ $book->author->first_name }} {{ $book->author->last_name }}</a>
                    </small>
                </p>
                <form action="{{ route('admin.edit', $book->id) }}" method="get" style="float: left;">
                    @csrf
                    <button type="submit" class="btn btn-success">Редактировать</button>
                </form>

                <form action="{{ route('admin.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('delete')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection