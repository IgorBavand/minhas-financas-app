<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
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

Route::get('/', [RegistroController::class, 'home'])->name('home');
Route::get('/registro/{ano}/{mes}', [RegistroController::class, 'verRegistro']);

Route::post('/gerar-registro', [RegistroController::class, 'novoRegistro']);
//Route::delete();

