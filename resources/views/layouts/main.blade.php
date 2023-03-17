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
            <a class="navbar-brand" href="{{ route('books.index') }}">Библиотека</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('books.index') }}">Главная страница</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('styles.index') }}">Жанры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Админ панель</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input name="search" class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Найти</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>