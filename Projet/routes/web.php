<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('immobilier',  App\Http\Controllers\ImmobilierController::class);

Route::resource('client',  App\Http\Controllers\ClientController::class);

Route::resource('admin',  App\Http\Controllers\AdminController::class);

Route::get('imprimer/{id}',[App\Http\Controllers\ImprimerController::class,'index'])->name('imprimer');