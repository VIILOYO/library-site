@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.styles.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input name="title" type="text" class="form-control" placeholder="Название" value="{{ old('title') ?? '' }}">

        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Добавить</button>
    </div>
</form>

@endsection