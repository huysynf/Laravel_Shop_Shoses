<?php
Route::resource('users','UserController');
Route::post('change-password/{id}','UserController@changePassword');
