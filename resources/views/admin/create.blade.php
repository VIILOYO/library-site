@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Название книги</label>
        <input name="title" type="text" class="form-control" placeholder="заголовок">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Описание"></textarea>
    </div>

    <div class="mb-3">
        <label for="author_id">Автор</label>
        <select class="form-select" id="author_id" name="author_id">
            @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->first_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="style_id">Жанр</label>
        <select class="form-select" id="style_id" name="style_id">
            @foreach ($styles as $style)
            <option value="{{ $style->id }}">{{ $style->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="year_of_release" class="form-label">Год издания</label>
        <input name="year_of_release" type="text" class="form-control" placeholder="Год издания">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Изображение</label>
        <input name="image" class="form-control" type="file" id="image">
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Создать</button>
    </div>
</form>

@endsection