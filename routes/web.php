<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

Auth::routes(['reset' => false, 'confirm' => false]);
//route login with google using socialite
Route::get('/auth/google', [LoginController::class, 'redirectToProvider'])->name('login.google');
Route::get('/auth/callback', [LoginController::class, 'handleProviderCallback'])->name('login.callback');

// Route group frontend (public)
Route::name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/blog/{slug}', [FrontendController::class, 'detail'])->name('blog.detail');
    Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('blog.category');
});

// Route group Admin, after login
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/dashboard/change-password', [DashboardController::class, 'changePassword'])->name('dashboard.change_password');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/data', [CategoryController::class, 'data'])->name('category.data');
    Route::get('/category/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/data', [PostController::class, 'data'])->name('post.data');
    Route::get('/post/detail/{id}', [PostController::class, 'detail'])->name('post.detail');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::post('/post/delete', [PostController::class, 'delete'])->name('post.delete');
});
