@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.posts.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок</label>
        <input name="title" type="text" class="form-control" placeholder="заголовок" value="{{ old('title') ?? '' }}">

        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Текст новости</label>
        <textarea name="content" class="form-control" rows="3" placeholder="Текст новости">{{ old('content') ?? '' }}</textarea>

        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Создать</button>
    </div>
</form>

@endsection