<?php

Route::resource('products','ProductController');

Route::get('product-image/{id}','ProductImageController@getImage');
