<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('books.index');
});


Route::group([ // Админ панель
    'namespace' => 'App\Http\Controllers\Admin', 
    //'middleware' => 'auth', 
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
    ], function() {
        Route::get('/', 'index')->name('index');
        Route::get('/{book}', 'show')->name('show');
        Route::get('/{book}/restore', 'restore')->name('restore');
        Route::delete('/{book}/forceDelete', 'forceDelete')->name('forceDelete');
        });
    Route::group([ // Авторы
        'namespace' => 'Author', 
        'prefix' => 'author', 
        'as' => 'authors.',
    ], function() {
            Route::get('/', IndexController::class)->name('index');
            Route::get('/{author}', ShowController::class)->whereNumber('author')->name('show');
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
    Route::get('/author/{author}', IndexController::class)->name('authors.index');
});