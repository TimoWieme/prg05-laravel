<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
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
Route::get('serie', [SerieController::class, 'index']);

Route::post('removeFavorite', [SerieController::class, 'removeFavorite'])->name('removeFavorite');
Route::post('addFavorite', [SerieController::class, 'addFavorite'])->name('addFavorite');
Route::post('/serie/changeStatus', [SerieController::class, 'updateStatus']);
Route::resource('serie', SerieController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profile', [UserController::class, 'show']);
Route::get('editprofile', [UserController::class, 'edit']);
Route::put('userupdate', [UserController::class, 'update']);

Route::get('add',[SerieController::class,'create']);
Route::post('add',[SerieController::class,'store']);
Route::get('read/{id}', [SerieController::class, 'read']);
Route::get('edit/{id}', [SerieController::class, 'edit']);
Route::put('update/{id}', [SerieController::class, 'update']);
Route::get('delete/{id}', [SerieController::class, 'destroy']);
Route::get('./serie/{genre}', [SerieController::class, 'showGenre'])->name('genre');
Auth::routes();
