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
Route::group(['middleware' => ['validateUser']], function () {
    
    
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
    route::post('/like',
    ['uses' => 'PublicacionesController@likes',
    'as' => 'like']);
    route::GET('/deletepost/{id}','PublicacionesController@deletepost');
    Route::post('/post/{id}','PublicacionesController@comments');
    Route::get('/updateProfile', 'perfilController@viewUpdateProfile');
    Route::POST('/updateProfiles1/{dataForm1}', 'perfilController@updateProfile1');
    Route::POST('/updateProfiles2/{dataForm2}', 'perfilController@updateProfile2');
    Route::get('/profile/{userprofile}', 'perfilController@viewOtherProfile');
    Route::get('searchProfile','homeController@searchProfile');
    route::GET('seguidores',"PublicacionesController@seguidor");

    // Eddu
    Route::post('/likes','loginController@likes');

    // Rutas relacionadas al chat
    include 'web/chat.php';
});
Route::get('', 'loginController@viewLogin');
Route::get('register', 'loginController@viewRegister')->name('register');

Route::post('verificar-usario', 'loginController@login');
    Route::get('registerdata', 'loginController@register');
    Route::get('logout', 'loginController@logout');





