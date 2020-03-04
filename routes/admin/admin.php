<?php

Route::get('/','DashboardController@index')->name('dashboard.index');

//lang
Route::get('/lang={lang}', function($lang) {
    session(['lang'=>$lang]);
    return back();
})->name('lang.admin');
