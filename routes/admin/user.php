<?php

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index')->name('users.index')->middleware('permission:view user');
    Route::get('/{id}', 'UserController@show')->where('id', '[0-9]+')->middleware('permission:view user');
    Route::get('/create', 'UserController@create')->name('users.create')->middleware('permission:delete user');
    Route::post('/', 'UserController@store')->name('users.store')->middleware('permission:new role');
    Route::get('{id}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:update user');
    Route::put('update/{id}', 'UserController@update')->name('users.update')->middleware('permission:update user');
    Route::delete('/{id}', 'UserController@destroy')->middleware('permission:delete role');
});

Route::post('change-password/{id}','UserController@changePassword');
