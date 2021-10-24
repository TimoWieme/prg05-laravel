<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SerieController;
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

Route::get('/', [HomePageController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/serie', [SerieController::class, 'index']);

Route::post('addFavorite', [SerieController::class, 'addFavorite'])->name('addFavorite');
Route::post('removeFavorite', [SerieController::class, 'removeFavorite'])->name('removeFavorite');


Route::resource('serie', SerieController::class);

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('add',[SerieController::class,'create']);
Route::post('add',[SerieController::class,'store']);

Route::get('read/{id}', [SerieController::class, 'read']);
Route::get('edit/{id}', [SerieController::class, 'edit']);
Route::put('update/{id}', [SerieController::class, 'update']);
Route::get('delete/{id}', [SerieController::class, 'destroy']);
