<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Models\Blog;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KategoriController;




// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Manajemen User
Route::resource('user', UserController::class)->names([
    'index' => 'user',
    'create' => 'user.create',
    'store' => 'user.store',
    'edit' => 'user.edit',
    'update' => 'user.update',
    'destroy' => 'user.destroy',
]);

// Blog CRUD - PAKE RESOURCE ROUTE (PALING SIMPLE)
Route::resource('blog', BlogController::class);



// Tampilkan daftar kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// Form tambah kategori
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');

// Simpan kategori baru
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');

// Form edit kategori
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');


// Update kategori
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

// Hapus kategori
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// Route utama blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


// TAMBAHIN ROUTES BARU INI:
Route::get('/blog/kategori/teknologi', [BlogController::class, 'teknologi'])->name('blog.teknologi');
Route::get('/blog/kategori/sport', [BlogController::class, 'sport'])->name('blog.sport');
Route::get('/blog/kategori/otomotif', [BlogController::class, 'otomotif'])->name('blog.otomotif');
Route::get('/blog/kategori/politik', [BlogController::class, 'politik'])->name('blog.politik');
Route::get('/blog/kategori/hiburan', [BlogController::class, 'hiburan'])->name('blog.hiburan');
Route::get('/blog/kategori/trending', [BlogController::class, 'trending'])->name('blog.trending');
// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Setelah login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('blog.index');


