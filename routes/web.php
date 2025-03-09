<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/post', [PostController::class, 'index'] )->name('post');
Route::get('/post/create',[PostController::class, 'create'])->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'show']);
Route::get('/post/{post:id}/edit', [PostController::class, 'edit'])->middleware('auth')->can('edit-post','post');
Route::patch('/post/{post}', [PostController::class, 'update'])->middleware('auth')->can('edit-post','post');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->middleware('auth')->can('edit-post','post');

Route::get('post/{post}/{image}', [PostController::class, 'image'])->middleware('auth')->can('edit-post','post');
Route::delete('post/{post}/{image}', [PostController::class, 'deleteimage'])->middleware('auth')->can('edit-post','post');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
