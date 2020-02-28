<?php

Route::get('/not-found','ErrorController@notfound')->name('manage.notfound');
Route::get('/forbidden','ErrorController@forbidden')->name('manage.forbidden');
