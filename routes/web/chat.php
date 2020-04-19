<?php
Route::get('chat', 'ChatController@index');
Route::get('messages/{id}', 'ChatController@getMessages');
Route::post('message', 'ChatController@sendMessage');
