<?php
Route::group(['prefix'=>'orders'],function (){
    Route::get('/orders', 'OrderController@index')->name('admin.orders.index');
});

