<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MovieController;

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

Route::resource('/movie', MovieController::class)->middleware('login');

Route::get('/register', 'App\Http\Controllers\RegisterController@index');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login')->middleware('noLogin');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticate');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
