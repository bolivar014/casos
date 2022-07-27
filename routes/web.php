<?php

use App\Http\Controllers\apisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TicketsController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta de recursos compartidos | Personas
Route::resource('/users', UsersController::class);

// Ruta de recursos compartidos | Tickets
Route::resource('/tickets', TicketsController::class);

// Recurso compartido de apis
Route::resource('/apis', apisController::class);