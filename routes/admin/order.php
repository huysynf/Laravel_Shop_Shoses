<?php
Route::group(['prefix'=>'orders'],function (){
    Route::get('/orders', 'OrderController@index')->name('admin.orders.index');
    Route::get('/get-orders/{id}', 'OrderController@show');

    Route::post('/update/{id}', 'OrderController@update');
});
