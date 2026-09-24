<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WimonsiriWeek07Controller;

Route::view('/', 'welcome')->name('landing');
Route::view('/welcome', 'welcome')->name('welcome');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// เส้นทางเดิมยังคงไว้เพื่อให้ผลงานสะสมจากสัปดาห์ก่อนหน้าเปิดได้
Route::get('/about', [AdminController::class, 'about'])->name('about');
Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::post('/blog', [AdminController::class, 'store'])->name('blog.store');
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::delete('/delete/{id}', [AdminController::class, 'delete'])->whereNumber('id')->name('blog.delete');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/change', [ProductController::class, 'change'])->whereNumber('id')->name('products.change');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->whereNumber('id')->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->whereNumber('id')->name('products.update');

Route::view('/claims/create', 'claims.create')->name('claims.create');
Route::post('/claims', [ClaimController::class, 'store'])->name('claims.store');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/cart', 'cart')->name('cart');
    Route::view('/checkout', 'checkout')->name('checkout');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/student/{id}', function (string $id) {
    return view('student', ['id' => $id]);
})->name('student.profile');

Route::prefix('week7-original')->name('week7-original.')->group(function () {
    Route::get('/', [WimonsiriWeek07Controller::class, 'index'])->name('index');
    Route::get('/login', [WimonsiriWeek07Controller::class, 'login'])->name('login');
    Route::post('/login', [WimonsiriWeek07Controller::class, 'loginStore'])->name('login.store');
    Route::get('/home', [WimonsiriWeek07Controller::class, 'home'])->name('home');
    Route::post('/logout', [WimonsiriWeek07Controller::class, 'logout'])->name('logout');
    Route::get('/add', [WimonsiriWeek07Controller::class, 'add'])->name('add');
    Route::get('/about', [WimonsiriWeek07Controller::class, 'about'])->name('about');
    Route::get('/blogs', [WimonsiriWeek07Controller::class, 'blogs'])->name('blogs');
});

Route::fallback(fn () => response('ไม่พบหน้าเว็บ', 404));