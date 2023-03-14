@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.update', $book->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="title" class="form-label">Название книги</label>
        <input name="title" type="text" class="form-control" placeholder="заголовок" value="{{ old('title') ??  $book->title }}">

        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <textarea name="description" class="form-control" rows="3" placeholder="Описание">{{ old('description') ?? $book->description }}</textarea>

        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="author_id">Автор</label>
        <select class="form-select" id="author_id" name="author_id">
            @if (old('author_id'))
                @foreach ($authors as $author)
                    <option
                        {{ old('author_id') == $author->id ? 'selected' : '' }}
                    
                        value="{{ $author->id }}">{{ $author->first_name }} {{ $author->first_name }}
                    </option>
                @endforeach
            @else
                @foreach ($authors as $author)
                    <option
                        {{ $book->author_id == $author->id ? 'selected' : '' }}
                    
                        value="{{ $author->id }}">{{ $author->first_name }} {{ $author->first_name }}
                    </option>
                @endforeach
            @endif

            @error('author_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </select>
    </div>

    <div class="mb-3">
        <label for="style_id">Жанр</label>
        <select class="form-select" id="style_id" name="style_id">
            @if (old('style_id'))
                @foreach ($styles as $style)
                    <option
                        {{ old('style_id') == $style->id ? 'selected' : '' }}

                        value="{{ $style->id }}">{{ $style->title }}
                    </option>
                @endforeach
            @else
                @foreach ($styles as $style)
                    <option
                        {{ $book->style_id == $style->id ? 'selected' : '' }}

                        value="{{ $style->id }}">{{ $style->title }}
                    </option>
                @endforeach
            @endif
            
            @error('style_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </select>
    </div>

    <div class="mb-3">
        <label for="year_of_release" class="form-label">Год издания</label>
        <input name="year_of_release" type="text" class="form-control" placeholder="Год издания" value="{{ old('year_of_release') ?? '' }}">

        @error('year_of_release')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Изображение</label>
        <input name="image" class="form-control" type="file" id="image">

        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Обновить</button>
    </div>
</form>
@endsection