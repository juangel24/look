<?php
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
Route::get('/profile','perfilController@profile');
/*Route::get('profile', 'perfilController@perfil');*/
route::post('/updatephoto','perfilController@uploadphoto')->name("/cambiarphoto");
route::get('/publicaciones','PublicacionesController@posts')->name('publicaciones');
route::POST('/posts','PublicacionesController@posts')->name('posts');
route::get('/userimage/{usuario}', [
    'uses' => 'perfilController@uploadphoto',
    'as' => 'uptadephoto.image'
]);
route::get('/posts/{id}','PublicacionesController@post');
Route::post('/post/{id}','PublicacionesController@comments');
Route::get('/updateProfile', 'perfilController@viewUpdateProfile');
Route::POST('/updateProfiles1/{dataForm1}', 'perfilController@updateProfile1');
Route::POST('/updateProfiles2/{dataForm2}', 'perfilController@updateProfile2');

Route::get('chat', 'ChatController@view');

Route::get('searchProfile','homeController@searchProfile');
