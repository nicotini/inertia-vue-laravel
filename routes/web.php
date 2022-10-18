<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');

require __DIR__.'/auth.php';
