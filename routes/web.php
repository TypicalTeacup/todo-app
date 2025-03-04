<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::prefix('/home')->group(function () {
    Route::get('/', function () {
        return view('user.home');
    });

    Route::get('/newTodo', function () {
        return view('user.newTodo');
    });
})->middleware('auth:sanctum');
