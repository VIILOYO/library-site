@extends('layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset($book->image) }}" width="480" height="640" class="img-fluid rounded-start" alt="Обложка">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->description }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        Автор: {{ $book->author->first_name }} {{ $book->author->last_name }}
                    </small>
                </p>
                <form action="{{ route('admin.trash.restore', $book->id) }}" method="get" style="float: left;">
                    @csrf
                    <button type="submit" class="btn btn-success">Восстановить</button>
                </form>

                <form action="{{ route('admin.trash.forceDelete', $book->id) }}" method="post" style="float: left;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Удалить безвозвратно</button>
                </form>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection