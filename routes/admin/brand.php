<?php

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'BrandController@index')->name('brands.index')->middleware('permission:view brand');
    Route::get('/{id}', 'BrandController@show')->middleware('permission:view brand');
    Route::post('/', 'BrandController@store')->name('brands.store')->middleware('permission:new brand');
    Route::post('/update/{id}','BrandController@update')->middleware('permission:update brand');
    Route::delete('/{id}', 'BrandController@destroy')->middleware('permission:delete brand');
});

