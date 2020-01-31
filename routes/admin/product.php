<?php

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('products.index')->middleware('permission:view product');
    Route::get('/{id}', 'ProductController@show')->where('id', '[0-9]+')->middleware('permission:view product');
    Route::get('/create', 'ProductController@create')->name('products.create')->middleware('permission:delete product');
    Route::post('/', 'ProductController@store')->name('products.store')->middleware('permission:new product');
    Route::get('{id}/edit', 'ProductController@edit')->name('products.edit')->middleware('permission:update product');
    Route::put('update/{id}',
        'ProductController@update')->name('products.update')->middleware('permission:update product');
    Route::delete('/{id}',
        'ProductController@destroy')->name('product.destroy')->middleware('permission:delete product');
});

//image
Route::get('product-image/{id}', 'ProductImageController@getImage')->middleware('permission:new product');
Route::post('product-image', 'ProductImageController@store')->middleware('permission:new product');
Route::delete('product-image/{id}', 'ProductImageController@destroy')->middleware('permission:new product');


//size
Route::get('product-size/{id}', 'ProductSizeController@getSize')->middleware('permission:new product');
Route::post('product-size', 'ProductSizeController@store')->middleware('permission:new product');
Route::delete('product-size/{id}', 'ProductSizeController@destroy')->middleware('permission:new product');


//color
Route::get('product-color/{id}',
    'ProductColorController@create')->name('products.color.create')->middleware('permission:new product');
Route::post('product-color',
    'ProductColorController@store')->name('products.color.store')->middleware('permission:new product');

Route::post('product-color/update/{id}', 'ProductColorController@update')->middleware('permission:new product');
Route::get('product-color/{id}/show', 'ProductColorController@show')->middleware('permission:new product');
Route::delete('product-color/{id}', 'ProductColorController@destroy')->middleware('permission:new product');

