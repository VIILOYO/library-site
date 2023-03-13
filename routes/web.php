<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'namespace' => 'App\Http\Controllers\Admin', 
    //'middleware' => 'auth', 
    'prefix' => 'admin', 
    'as' => 'admin.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::post('/', StoreController::class)->name('store');
    Route::get('/create', CreateController::class)->name('create');
    Route::get('/{book}', ShowController::class)->name('show');
    Route::group([
        'namespace' => 'Author', 
        'prefix' => 'author', 
        'as' => 'author.',
    ], function() {
            Route::get('/{author}', IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
        });
});

Route::group([
    'namespace' => 'App\Http\Controllers\Book',
    'prefix' => 'books',
    'as' => 'books.',
], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/{book}', ShowController::class)->name('show');
});