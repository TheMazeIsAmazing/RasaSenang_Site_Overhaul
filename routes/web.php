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
Route::get('/reserveren', [ReservationController::class, 'create'])->name('reservation.create');
Route::get('/overzicht-reserveringen', [ReservationController::class, 'index'])->name('reservation.index');
Route::get('/reservering-details/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
Route::get('/reservering-wijzigen/{reservation}', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::post('/overzicht-reserveringen', [ReservationController::class, 'search'])->name('reservation.search');

use App\Http\Controllers\DishController;
Route::resource('dish', DishController::class);
Route::get('/menukaart', [DishController::class, 'index'])->name('dish.index');
Route::get('/nieuw-gerecht', [DishController::class, 'create'])->name('dish.create');
Route::get('/gerecht-details/{dish}', [DishController::class, 'show'])->name('dish.show');
Route::get('/gerecht-wijzigen/{dish}', [DishController::class, 'edit'])->name('dish.edit');
Route::post('dish/{dish}/toggleHighlight', [DishController::class, 'toggleHighlight'])->name('dish.toggleHighlight');
Route::post('/menukaart', [DishController::class, 'search'])->name('dish.search');
Route::get('dish/{dish}/edit_ingredients', [DishController::class, 'edit_ingredients'])->name('dish.edit_ingredients');
Route::post('dish/{dish}/store_ingredients', [DishController::class, 'store_ingredients'])->name('dish.store_ingredients');

use App\Http\Controllers\IngredientController;
Route::resource('ingredient', IngredientController::class);

use App\Http\Controllers\ReviewController;
Route::resource('review', ReviewController::class);

use App\Http\Controllers\BuffetController;
Route::resource('buffet', BuffetController::class);

Auth::routes();
use App\Http\Controllers\ProfileController;
Route::get('/account', [ProfileController::class, 'index'])->name('profile');
