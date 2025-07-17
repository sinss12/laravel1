<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;  

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('user', UserController::class)->names([
    'index' => 'user',
    'create' => 'user.create',
    'store' => 'user.store',
    'edit' => 'user.edit',
    'update' => 'user.update',
    'destroy' => 'user.destroy',
]);

//




Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');


