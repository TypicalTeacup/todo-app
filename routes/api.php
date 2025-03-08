<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;
        return ['token' => $token];
    }
    return ['message' => 'Invalid credentials'];
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/todo')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::put('/', [TodoController::class, 'store'])->can('create', Todo::class);

    Route::get('/{todo}', [TodoController::class, 'get'])->can('view', 'todo');
    Route::patch('/{todo}', [TodoController::class, 'update'])->can('update', 'todo');
    Route::delete('/{todo}', [TodoController::class, 'destroy'])->can('delete', 'todo');
    Route::post('/{todo}/share', [TodoController::class, 'shareLink'])->can('share', 'todo');
})->whereNumber('todo');
