@extends('layouts.main')

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
            </div>
        </div>
    </div>
</div>
@endsection