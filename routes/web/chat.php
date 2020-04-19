<?php
Route::get('chat', 'ChatController@view');
Route::get('messages/{id}', 'ChatController@getMessages');
Route::post('message', 'ChatController@sendMessage');
