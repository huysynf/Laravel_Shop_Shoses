<?php
Route::get('/auth/google', 'LoginWithGoogleController@redirect')->name('login.google');
Route::get('/auth/google/callback', 'LoginWithGoogleController@callback')->name('login.google_callback');
