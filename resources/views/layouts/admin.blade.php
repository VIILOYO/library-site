<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/af104dbd7e.js" crossorigin="anonymous"></script>
    <title>Админка</title>
    <style>
        .card img {
            height: 520px;
            width: 420px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="{{ route('admin.index') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <i class="fa-solid fa-bars"></i><span class="ms-1 fs-5 d-none d-sm-inline">Меню</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{ route('books.index') }}" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-book-open"></i> <span class="ms-1 d-none d-sm-inline">Пользовательский сайт</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-square-caret-down"></i><span class="ms-1 d-none d-sm-inline"> Библиотека</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('admin.index') }}" class="nav-link px-0">
                                        <span class="d-none d-sm-inline"><i class="fa-solid fa-house"></i> Книги</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.authors.index') }}" class="nav-link px-0">
                                        <span class="d-none d-sm-inline"><i class="fa-solid fa-users"></i> Авторы</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.styles.index') }}" class="nav-link px-0">
                                        <span class="d-none d-sm-inline"><i class="fa-solid fa-book-bookmark"></i> Жанры</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-square-caret-down"></i><span class="ms-1 d-none d-sm-inline"> Добавить</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('admin.create') }}" class="nav-link align-middle px-0">
                                        <i class="fa-solid fa-book"></i> <span class="ms-1 d-none d-sm-inline">Добавить книгу</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.authors.create') }}" class="nav-link px-0">
                                        <span class="d-none d-sm-inline"><i class="fa-solid fa-users"></i>Добавить автора</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.styles.create') }}" class="nav-link px-0">
                                        <span class="d-none d-sm-inline"><i class="fa-solid fa-book-bookmark"></i>Добавить жанр</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.trash.index') }}" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-trash"></i> <span class="ms-1 d-none d-sm-inline">Удаленные книгу</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>