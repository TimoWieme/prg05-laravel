<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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

// Detail page of Serie
Route::get('serie', [SerieController::class, 'index']);

// Search and filter page
Route::post('/search', [SearchController::class, 'search']);
Route::get('/filter', [SerieController::class, 'index']);
Route::get('/filter/{genre}', [SerieController::class, 'showGenre'])->name('genre');


Route::post('removeFavorite', [SerieController::class, 'removeFavorite'])->name('removeFavorite');
Route::post('addFavorite', [SerieController::class, 'addFavorite'])->name('addFavorite');
Route::post('/serie/changeStatus', [SerieController::class, 'updateStatus']);
Route::resource('serie', SerieController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth', 'admin');
Route::get('/profile', [UserController::class, 'show'])->middleware('auth');
Route::get('editprofile', [UserController::class, 'edit'])->middleware('auth');
Route::put('userupdate', [UserController::class, 'update'])->middleware('auth');

Route::get('add',[SerieController::class,'create']);
Route::post('add',[SerieController::class,'store']);
Route::get('read/{id}', [SerieController::class, 'read'])->middleware('auth', 'admin');
Route::get('edit/{id}', [SerieController::class, 'edit'])->middleware('auth', 'admin');
Route::put('update/{id}', [SerieController::class, 'update'])->middleware('auth', 'admin');
Route::get('delete/{id}', [SerieController::class, 'destroy'])->middleware('auth', 'admin');
Route::get('/serie/{genre}', [SerieController::class, 'showGenre'])->name('genre');
Auth::routes();
