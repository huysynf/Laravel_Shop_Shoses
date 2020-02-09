<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/{slug}', 'HomeController@showproduct')->name('categories.product');
Route::get('/product/{slug}', 'HomeController@productdetail')->name('product.detail');
Route::get('/product/color/{id}','HomeController@getcolor');
