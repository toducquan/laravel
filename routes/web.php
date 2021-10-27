<?php

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

Route::prefix('user')->group(function () {
    Route::get('infor', 'UserController@infor')->middleware('auth');
    Route::get('login', 'UserController@login')->name('login');
    Route::get('register', 'UserController@register')->name('register');
});

Route::post('/register', 'UserController@store');
Route::post('/login', 'UserController@index');