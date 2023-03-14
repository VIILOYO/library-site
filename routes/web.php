<?php

use App\Http\Controllers\Admin\DestroyController;
use App\Http\Controllers\Admin\EditController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UpdateController;
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
        'as' => 'author.',
    ], function() {
            Route::get('/{author}', IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
        });
});

Route::group([ // Часть для обычных юзеров
    'namespace' => 'App\Http\Controllers\Book',
    'prefix' => 'books',
    'as' => 'books.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/{book}', ShowController::class)->name('show');
});