<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; //importado el controlador
use App\Http\Controllers\JuegoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// INICIO
Route::get('/', HomeController::class) -> name('home'); 

// JUEGO
Route::get('juegoPrimero', [JuegoController::class, 'juegoPrimero']) -> name('juegoPrimero');
Route::put('juegoResto', [JuegoController::class, 'juegoResto']) -> name('juegoResto');
Route::put('puntuacion', [JuegoController::class, 'puntuacion']) -> name('puntuacion');
Route::post('modificarImg', [JuegoController::class, 'modificarImg']) -> name('modificarImg');

Route::get('eliminarUsuario', [JuegoController::class, 'eliminarUsuario']) -> name('eliminarUsuario');
Route::get('juegoRanking', [JuegoController::class, 'juegoRanking']) -> name('juegoRanking');

Route::get('descargarPDF', [JuegoController::class, 'descargarPDF']) -> name('descargarPDF');
Route::get('descargarPDF2', [JuegoController::class, 'descargarPDF2']) -> name('descargarPDF2');