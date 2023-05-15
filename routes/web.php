<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rotas com controllers

Route::middleware('auth')->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/reserva', [App\Http\Controllers\ReservaDeMesaController::class, 'index'])->name('reserva');
    Route::post('/efetuar-reserva', [App\Http\Controllers\ReservaDeMesaController::class, 'submit'])->name('efetuar');
    Route::get('/lista', [App\Http\Controllers\ListaDasMesasReservadasController::class, 'index'])->name('lista');

});

