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

// ACCESS TO Look!

Route::get('', 'loginController@viewLogin');

Route::get('verificar-usario', 'loginController@login');
Route::get('register', 'loginController@viewRegister')->name('register');
Route::get('registerdata', 'loginController@register');

Route::get('prueba', 'loginController@prueba');