<?php

use App\Http\Controllers\ProformaController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('proformas', App\Http\Controllers\ProformaController::class)->middleware('auth');
Route::resource('clientes', App\Http\Controllers\ClienteController::class)->middleware('auth');
Route::resource('asesors', App\Http\Controllers\AsesorController::class)->middleware('auth');
Route::resource('proyectos', App\Http\Controllers\ProyectoController::class)->middleware('auth');
Route::get('/generate-pdf/{id}', [ProformaController::class, 'generatePDF'])->middleware('auth')->name('proformas.documento');



Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
