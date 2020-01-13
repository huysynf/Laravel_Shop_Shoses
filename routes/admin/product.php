<?php

Route::resource('products','ProductController');

Route::get('product-image/{id}','ProductImageController@getImage');
Route::post('product-image','ProductImageController@store');
Route::delete('product-image/{id}','ProductImageController@destroy');
