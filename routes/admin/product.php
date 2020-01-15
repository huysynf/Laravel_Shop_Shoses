<?php

Route::resource('products','ProductController');
//image
Route::get('product-image/{id}','ProductImageController@getImage');
Route::post('product-image','ProductImageController@store');
Route::delete('product-image/{id}','ProductImageController@destroy');


//size
Route::get('product-size/{id}','ProductSizeController@getSize');
Route::post('product-size','ProductSizeController@store');
Route::delete('product-size/{id}','ProductSizeController@destroy');


//color
Route::get('product-color/{id}','ProductColorController@create')->name('products.color.create');
Route::post('product-color','ProductColorController@store')->name('products.color.store');

Route::post('product-color/update/{id}','ProductColorController@update');
Route::get('product-color/{id}/show','ProductColorController@show');
Route::delete('product-color/{id}','ProductColorController@destroy');

