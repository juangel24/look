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

    // LOGIN
Route::get('', 'loginController@viewLogin');
Route::post('verificar-usario', 'loginController@login');
    // REGISTER
Route::get('register', 'loginController@viewRegister')->name('register');
Route::get('registerdata', 'loginController@register');
    // PRUEBON
Route::get('prueba', 'loginController@prueba');

//PERFIL
Route::get('profile', function() { return view('perfil.perfil'); });
/*Route::get('profile', 'perfilController@perfil');*/
route::post('/uptadephoto','perfilController@uploadphoto')->name("/cambiarphoto");
route::get('/userimage/{usuario}', [
    'uses' => 'perfilController@uploadphoto',
    'as' => 'uptadephoto.image'
]);

Route::get('chat', function() { return view('chat'); });

Route::get('searchProfile','homeController@searchProfile');
