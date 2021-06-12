<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/todolist/edit/{id}', 'TodoController@parseData');
        Route::post('/todolist/edit/{id}', 'TodoController@edit');
        Route::get('/todolist', 'TodoController@index');
        Route::get('/todolist/delete/{id}', 'TodoController@delete')->Middleware(['auth', 'password.confirm']);
        Route::post('/todolist', 'TodoController@submit');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
