<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return  view('about', [
        "title" => "About",
        "name" => "Nada",
        "email" => "naddyyum@gmail.com",
        "image" => "cheeks.jpg",
        "active" => "about"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/signin', [SignInController::class, 'index'])->name('signin')->middleware('guest');
Route::post('/signin', [SignInController::class, 'authenticate']);
Route::post('/signout', [SignInController::class, 'signout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// route store data in register
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// routes using custom middleware from kernel.php
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');

// routes using gate from AppServiceProvider
// Route::resource('/dashboard/categories', AdminCategoryController::class);
