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
