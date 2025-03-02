<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/post', [PostController::class, 'index'] )->name('post');
Route::get('/post/create',[PostController::class, 'create'])->middleware('auth');
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::patch('/post/{id}', [PostController::class, 'update'])->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->middleware('auth');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
