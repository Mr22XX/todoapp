<?php

use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todo.app');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::post('/post', [TodoController::class, 'store'])->name('todo.post');
Route::delete('/post/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
