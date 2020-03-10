<?php
Route::get('/auth/google', 'LoginWithGoogleController@redirect')->name('login.google');
Route::get('/auth/google/callback', 'LoginWithGoogleController@callback')->name('login.google_callback');


Route::get('/auth/facebook', 'LoginWithFacebookController@redirect')->name('login.facebook');
Route::get('/auth/facebook/callback', 'LoginWithFacebookController@callback')->name('login.facebook_callback');
