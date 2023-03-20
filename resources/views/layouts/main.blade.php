<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Мой сайт</title>
    <style>
        .card img {
            height: 520px;
            width: 420px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}">Библиотека</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('books.index') }}">Книги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('authors.index') }}">Авторы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('styles.index') }}">Жанры</a>
                    </li>
                    @can('view', auth()->user())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Админ панель</a>
                        </li>
                    @endcan
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li>
                        <form class="d-flex" role="search">
                            <input name="search" class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Найти</button>
                        </form>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('favorites') }}">
                                    {{ __('Избранное') }}
                                </a>
                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="left">
        <h5>Новости библиотеки</h5>
        <div class="list-group element">
        @foreach ($posts as $post)
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex">
                    <h5 class="title">{{ \Illuminate\Support\Str::limit($post->title, 20, $end='...') }}</h5>
                    <small>{{ $post->created_at }}</small>
                </div>
            </a>
        @endforeach
        </div>
    </div>

    <div class="container mt-3 content">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="footer">
        <ul>
            <a href="https://yandex.ru/maps/64/kemerovo/house/ulitsa_dzerzhinskogo_19/bE8YdgBkSUMDQFtvfX91eX1ibQ==/?ll=86.076374%2C55.346892&z=17.08"><li>Адрес: г.Кемерово улица Дзержинского, 19</li></a>
            <a href="https://vk.com/viiiloyo"><li>ВК: Алексей Бабенко</li></a>
            <a href="https://github.com/VIILOYO/library-site"><li>GitHub проекта</li></a>
            <a href="https://t.me/VIILOYO"><li>Телеграм: Алексей Бабенко</li></a>
        </ul>
    </div>

</body>
</html>