<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

// Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit')->middleware('auth');

// Route::post('/ideas/{idea}/edit', [IdeaController::class, 'update'])->name('ideas.update')->middleware('auth');;

// Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy')->middleware('auth');

// Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store')->middleware('auth');

// Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');



Route::resource('ideas', IdeaController::class)->except(['create', 'index', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only('show');

Route::resource('ideas.comments', CommentController::class)->only('store')->middleware('auth');

Route::resource('users', UserController::class)->only(['edit', 'update', 'show'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
