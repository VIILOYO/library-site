<?php

use App\Http\Controllers\FavoriteBooksController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', MainController::class)->name('main');
Route::get('/{post}', PostController::class)->name('show')->whereNumber('post');

Route::group([ // Админ панель
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'auth',
    'middleware' => 'admin',
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::post('/', StoreController::class)->name('store');
    Route::get('/create', CreateController::class)->name('create');
    Route::get('/{book}', ShowController::class)->name('show')->whereNumber('book');
    Route::get('/{book}/edit', EditController::class)->name('edit');
    Route::put('/{book}', UpdateController::class)->name('update')->whereNumber('book');
    Route::delete('/{book}', DestroyController::class)->name('destroy')->whereNumber('book');
    Route::group([ // Удаленные книги
        'controller' => TrashController::class,
        'prefix' => 'trash',
        'as' => 'trash.',
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{book}', 'show')->name('show');
        Route::get('/{book}/restore', 'restore')->name('restore');
        Route::delete('/{book}/forceDelete', 'forceDelete')->name('forceDelete');
    });
    Route::group([ // Авторы
        'namespace' => 'Author',
        'prefix' => 'author',
        'as' => 'authors.',
    ], function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{author}', ShowController::class)->whereNumber('author')->name('show');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
    });
    Route::group([ // Стили
        'namespace' => 'Style',
        'prefix' => 'style',
        'as' => 'styles.',
    ], function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{style}', ShowController::class)->whereNumber('style')->name('show');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
    });
    Route::group([ // Посты
        'namespace' => 'Post',
        'prefix' => 'post',
        'as' => 'posts.',
    ], function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{post}', ShowController::class)->whereNumber('post')->name('show');
        Route::delete('/{post}', DestroyController::class)->name('destroy')->whereNumber('post');
        Route::get('/{post}/edit', EditController::class)->name('edit');
        Route::put('/{post}', UpdateController::class)->name('update')->whereNumber('post');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
    });
});

Route::group([ // Часть для обычных юзеров
    'namespace' => 'App\Http\Controllers\Book',
    'prefix' => 'books',
    'as' => 'books.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/{book}', ShowController::class)->name('show');
    Route::get('/{book}/favorite', FavoriteController::class)->name('favorite');
    Route::get('/{book}/unfavorite', UnfavoriteController::class)->name('unfavorite');
});

Route::group([ // Авторы для юзеров
    'namespace' => 'App\Http\Controllers\Style',
    'prefix' => 'styles',
    'as' => 'styles.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/{style}', ShowController::class)->name('show');
});

Route::group([ // Авторы для юзеров
    'namespace' => 'App\Http\Controllers\Author',
    'prefix' => 'authors',
    'as' => 'authors.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/{author}', ShowController::class)->name('show');
});

Route::get('/favorites', FavoriteBooksController::class)->name('favorites');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
