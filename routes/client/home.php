<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products/{slug}', 'HomeController@showproduct')->name('categories.product');
Route::get('/product/{slug}', 'HomeController@productdetail')->name('product.detail');
Route::get('/product/color/{id}','HomeController@getcolor');

Route::get('/carts','CartController@index')->name('carts.index');

Route::get('/gest-login','LoginController@getlogin')->name('login.login');
Route::post('/gest-login','LoginController@login')->name('login.postlogin');
Route::post('/logout','LoginController@logout')->name('login.logout');
Route::get('/gest-register','LoginController@getregister')->name('login.getregister');
Route::post('/gest-register','LoginController@register')->name('login.register');
