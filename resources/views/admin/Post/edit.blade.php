@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.posts.update', $post->id) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок</label>
        <input name="title" type="text" class="form-control" placeholder="заголовок" value="{{ old('title') ??  $post->title }}">

        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Текст новости</label>
        <textarea name="content" class="form-control" rows="3" placeholder="Текст новости">{{ old('content') ?? $post->content }}</textarea>

        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Обновить</button>
    </div>
</form>
@endsection