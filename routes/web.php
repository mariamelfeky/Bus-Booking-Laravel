<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::namespace('App\Http\Controllers\Dashboard')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Route::resource('users', UserController::class);
    Route::resource('trips', TripController::class);
    Route::resource('trip_user', UserTripController::class);
});
