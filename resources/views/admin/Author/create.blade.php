@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.authors.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="first_name" class="form-label">Имя</label>
        <input name="first_name" type="text" class="form-control" placeholder="Имя" value="{{ old('first_name') ?? '' }}">

        @error('first_name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Фамилия</label>
        <input name="last_name" type="text" class="form-control" placeholder="Фамилия" value="{{ old('last_name') ?? '' }}">

        @error('last_name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="country" class="form-label">Страна</label>
        <input name="country" type="text" class="form-control" placeholder="Страна" value="{{ old('country') ?? '' }}">

        @error('country')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Добавить</button>
    </div>
</form>

@endsection