<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\BiodataSiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Logout
Route::resource('/user', UserPageController::class);
Route::get('/user', [UserPageController::class, 'user'])->name('userpage.index');

// ROUTE PROFILE
Route::middleware(['auth'])->group(function () {
    Route::resource('/biodata-siswa', BiodataSiswaController::class);
    Route::get('/profile', [BiodataSiswaController::class, 'index'])->name('biodata_siswa.page');
});

// ROUTE KATEGORI
Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::resource('courses', CourseController::class);

// KATEGORI COURSE
Route::resource('kategori', KategoriController::class);
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

//  BOOK
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::resource('book', BookController::class);
