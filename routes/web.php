<?php

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

use App\Http\Controllers\HomepageController;
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

use App\Http\Controllers\PrivacystatementController;
Route::get('/privacystatement', [PrivacystatementController::class, 'index'])->name('privacystatement');

use App\Http\Controllers\ReservationController;
Route::resource('reservation', ReservationController::class);
Route::post('reservation/search', [ReservationController::class, 'search'])->name('reservation.search');

use App\Http\Controllers\DishController;
Route::resource('dish', DishController::class);
Route::post('dish/{dish}/toggleHighlight', [DishController::class, 'toggleHighlight'])->name('dish.toggleHighlight');
Route::post('dish/search', [DishController::class, 'search'])->name('dish.search');
Route::get('dish/{dish}/edit_ingredients', [DishController::class, 'edit_ingredients'])->name('dish.edit_ingredients');
Route::post('dish/{dish}/store_ingredients', [DishController::class, 'store_ingredients'])->name('dish.store_ingredients');

use App\Http\Controllers\IngredientCotroller;
Route::resource('ingredient', IngredientCotroller::class);

use App\Http\Controllers\ReviewController;
Route::resource('review', ReviewController::class);

Auth::routes();
use App\Http\Controllers\HomeController;
Route::get('/inloggen', [HomeController::class, 'index'])->name('home');
