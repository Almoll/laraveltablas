<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\juegoController;
use App\Http\Controllers\CategoriaController;
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
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('empleado/create', [EmpleadoController::class,'create']);
*/




Route::resource('categoria',categoriaController::class)->middleware('auth');

Auth::routes([]);

Route::get('/home', [categoriaController::class, 'index'])->name('home');


Route::group(['middleware'=> 'auth'], function () {

    Route::get('/', [categoriaController::class, 'index'])->name('home');

});


Route::resource('juego',juegoController::class)->middleware('auth');

Auth::routes([]);

Route::get('/home', [juegoController::class, 'index'])->name('home');


Route::group(['middleware'=> 'auth'], function () {

    Route::get('/', [juegoController::class, 'index'])->name('home');

});

