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
    Route::get('/{book}', ShowController::class)->name('show');
    Route::group([
        'namespace' => 'Author', 
        'prefix' => 'author', 
        'as' => 'author.',
    ], function() {
            Route::get('/{author}', IndexController::class)->name('index');
        });
});