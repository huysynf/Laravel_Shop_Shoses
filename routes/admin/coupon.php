<?php

Route::group(['prefix' => 'coupons'], function () {
    Route::get('/', 'ClassroomController@index')->name('coupons.index')->middleware('permission:view coupon');
    Route::get('/{id}', 'CouponController@show')->where('id', '[0-9]+')->middleware('permission:view coupon');
    Route::get('/create','CouponController@create')->name('coupons.create')->middleware('permission:delete coupon');
    Route::post('/', 'CouponController@store')->name('coupons.store')->middleware('permission:new coupon');
    Route::get('{id}/edit', 'CouponController@edit')->name('coupons.edit')->middleware('permission:update coupon');
    Route::put('update/{id}','CouponController@update')->name('coupons.update')->middleware('permission:update coupon');
    Route::delete('/{id}', 'CouponController@destroy')->middleware('permission:delete coupon');
});
