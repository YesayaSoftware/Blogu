<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(
    CategoryController::class
)->group(function() {
    Route::get('/categories', 'index')
        ->name('categories.index');

    Route::get('/categories/create', 'create')
        ->name('categories.create');

    Route::post('/categories', 'store')
        ->name('categories.store');

    Route::get('/categories/{category}/edit', 'edit')
        ->name('categories.edit');

    Route::patch('/categories/{category}', 'update')
        ->name('categories.update');

    Route::get('/categories/{category}', 'show')
        ->name('categories.show');

    Route::delete('/categories/{category}', 'destroy')
        ->name('categories.destroy');
});

Route::controller(
    PostController::class
)->group(function () {
    Route::get('/posts', 'index')
        ->name('posts.index');

    Route::get('/posts/create', 'create')
        ->name('posts.create');

    Route::post('/posts', 'store')
        ->name('posts.store');

    Route::get('/posts/{post}/edit', 'edit')
        ->name('posts.edit');

    Route::patch('/posts/{post}', 'update')
        ->name('posts.update');

    Route::get('/posts/{post}', 'show')
        ->name('posts.show');

    Route::delete('/posts/{post}', 'destroy')
        ->name('posts.destroy');
});
