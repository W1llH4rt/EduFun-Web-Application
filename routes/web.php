<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/writers', [WriterController::class, 'index'])->name('writer.index');
Route::get('/writer/{id}', [WriterController::class, 'show'])->name('writer.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/popular', [PopularController::class, 'index'])->name('popular');
