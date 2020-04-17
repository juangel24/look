<?php
Route::get('chat', 'ChatController@view');
Route::get('message/{id}', 'ChatController@getMessages');
