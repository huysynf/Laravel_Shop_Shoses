<?php
Route::group(['prefix'=>'categories'],function (){
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::post('/', 'CategoryController@store')->name('categories.store');
    Route::get('/{id}', 'CategoryController@show')->name('categories.show');
    Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/{id}', 'CategoryController@destroy');
});

