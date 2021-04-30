<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuidadorController;
use App\Http\Controllers\JaulaController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CriaController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\MadreController;

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
    return view('auth.login');
});

Route::resource('cuidador',CuidadorController::class)->middleware('auth');
Route::resource('jaula',JaulaController::class)->middleware('auth');
Route::resource('animal',AnimalController::class)->middleware('auth');
Route::resource('cria',CriaController::class)->middleware('auth');
Route::resource('padre',PadreController::class)->middleware('auth');
Route::resource('madre',MadreController::class)->middleware('auth');
Auth::routes(['reset'=>false]);
Route::get('/home', [CuidadorController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {
    Route::get('/', [CuidadorController::class, 'index'])->name('home');
});