<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
    Route::get('infor', 'PostController@index')->middleware(['auth', 'can:getPost, App\Post']);
    Route::get('login', 'UserController@loginView')->name('login');
    Route::get('register', 'UserController@registerView')->name('register');
    Route::get('addPost', 'PostController@createView')->middleware(['auth', 'can:addPost, App\Post']);
    Route::get('admin', 'UserController@adminView');
//    Route::get('admin', 'UserController@adminView')->middleware('can:getUser, App\User');
    Route::get('manage', 'PostController@index')->middleware(['auth', 'can:getPost, App\Post']);
    Route::get('/edit/{id}', 'PostController@updateView')->middleware(['auth']);
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::get('/post/{id}', 'PostController@destroy')->middleware(['auth']);
Route::get('/user/{id}', 'UserController@destroy')->middleware(['can:deleteUser, App\User', 'auth']);
Route::post('/post', 'PostController@create')->middleware(['auth', 'can:addPost, App\Post']);
Route::post('/edit/{id}', 'PostController@update')->middleware(['auth']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
