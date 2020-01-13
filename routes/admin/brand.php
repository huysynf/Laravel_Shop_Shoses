<?php
Route::resource('brands','BrandController')->only(['index','show','destroy','store']);
Route::post('brands/update/{id}','BrandController@update');
