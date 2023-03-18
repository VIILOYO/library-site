@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свою почту') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Отправить письмо для сброса пароля повторно') }}
                        </div>
                    @endif

                    {{ __('Проверьте свою почту на наличие письма для сброса пароля') }}
                    {{ __('Если вы не помните почту') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите сюда для другого') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
