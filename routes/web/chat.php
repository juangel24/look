<?php
Route::get('chat', 'ChatController@index');
Route::get('messages/{id}', 'ChatController@getMessages');
Route::post('message', 'ChatController@sendMessage');
Route::post('message-many', 'ChatController@sendMessages');
Route::get('user-search', 'ChatController@searchUsers');
Route::get('confirm-read/{id}', 'ChatController@confirmRead');
