<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Home
Route::get('/', [HomePageController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::post('removeFavorite', [SerieController::class, 'removeFavorite'])->name('removeFavorite');
Route::post('addFavorite', [SerieController::class, 'addFavorite'])->name('addFavorite');
Route::get('serie', [SerieController::class, 'index']);
Route::get('profile', [ProfileController::class, 'index']);


Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');
Route::resource('user', UserController::class);
Route::resource('serie', SerieController::class);

Route::get('add',[SerieController::class,'create']);
Route::post('add',[SerieController::class,'store']);

Route::get('read/{id}', [SerieController::class, 'read']);
Route::get('edit/{id}', [SerieController::class, 'edit']);
Route::put('update/{id}', [SerieController::class, 'update']);
Route::get('delete/{id}', [SerieController::class, 'destroy']);

Route::get('./serie/{genre}', [SerieController::class, 'showGenre'])->name('genre');
Auth::routes();
