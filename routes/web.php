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

Route::prefix('view')->group(function () {
    Route::get('infor', 'PostController@index')->middleware('auth');
    Route::get('role', 'RoleController@index')->middleware('auth');
    Route::get('block', 'RoleController@blockView')->middleware('auth');
    Route::get('login', 'UserController@loginView')->name('login');
    Route::get('register', 'UserController@registerView')->name('register');
    Route::get('addPost', 'PostController@createView')->middleware('auth');
    Route::get('/edit/{id}', 'PostController@updateView')->middleware(['auth']);
    Route::get('admin', 'UserController@adminView')->middleware('admin');
    Route::get('manage', 'PostController@index')->middleware('admin');
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::get('/post/{id}', 'PostController@destroy')->middleware(['auth']);
Route::get('/role/{id}', 'RoleController@destroy')->middleware(['auth']);
Route::get('/user/{id}', 'UserController@destroy')->middleware(['auth']);
Route::post('/post', 'PostController@create')->middleware(['auth']);
Route::post('/block', 'RoleController@create')->middleware(['auth']);
Route::post('/edit/{id}', 'PostController@update')->middleware(['auth']);
