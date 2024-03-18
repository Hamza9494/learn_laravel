<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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


Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('show');

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('edit')->middleware('auth');

Route::post('/ideas/{idea}/edit', [IdeaController::class, 'update'])->name('update')->middleware('auth');;

Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('destroy')->middleware('auth');

Route::post('/ideas', [IdeaController::class, 'store'])->name('store')->middleware('auth');

Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');


//Route::resource('ideas', IdeaController::class)->except(['create', 'index', 'show'])->middleware('auth');

//Route::resource('ideas', IdeaController::class)->only('show');

// Route::resource('ideas.comments', CommentController::class)->only('store')->middleware('auth');
