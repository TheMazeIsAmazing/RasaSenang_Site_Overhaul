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

use App\Http\Controllers\ReservationController;
Route::resource('reservation', ReservationController::class);

//use App\Http\Controllers\ReservationsController;
//Route::get('/overzicht_reserveringen', [ReservationsController::class, 'index'])->name('reservations-page');
//Route::post('create-reservation', [ReservationsController::class, 'create'])->name('reservations.store');
//Route::get('delete-reservation/{id}', [ReservationsController::class, 'destroy']);


//use App\Http\Controllers\ReservationFormController;
//Route::get('/reserveren', [ReservationFormController::class, 'index'])->name('reservation-form');


use App\Http\Controllers\DetailsReservationController;
Route::get('/overzicht_reserveringen/details', [DetailsReservationController::class, 'index'])->name('reservation-details');



Auth::routes();
use App\Http\Controllers\HomeController;
Route::get('/inloggen', [HomeController::class, 'index'])->name('home');
