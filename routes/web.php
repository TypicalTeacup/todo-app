<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/todo/{todo}', [TodoController::class, 'show'])->middleware('signed')->name('todo.shareLink');

Route::prefix('/home')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [UserController::class, 'home']);

        Route::prefix('/todo')->group(function () {
            Route::get('/new', [TodoController::class, 'create'])->can('create', Todo::class)->name('todo.create');
            Route::get('/{todo}/edit', [TodoController::class, 'edit'])->can('update', 'todo')->name('todo.edit');
            Route::get('/{todo}/show', [TodoController::class, 'show'])->can('view', 'todo')->name('todo.show');
            Route::get('/{todo}/share', [TodoController::class, 'share'])->can('view', 'todo')->name('todo.share');
        })->whereNumber('todo');
    });
