<?php
Route::group(['prefix' => 'roles'], function () {
    Route::get('/', 'RoleController@index')->name('roles.index')->middleware('permission:view role');
    Route::get('/{id}', 'RoleController@show')->where('id', '[0-9]+')->middleware('permission:view role');
    Route::get('/create','RoleController@create')->name('roles.create')->middleware('permission:delete role');
    Route::post('/', 'RoleController@store')->name('roles.store')->middleware('permission:new role');
    Route::get('{id}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:update role');
    Route::put('update/{id}','RoleController@update')->name('roles.update')->middleware('permission:update role');
    Route::delete('/{id}', 'RoleController@destroy')->middleware('permission:delete role');
});
