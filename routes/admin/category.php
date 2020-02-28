<?php
Route::group(['prefix'=>'categories'],function (){
    Route::get('/', 'CategoryController@index')->name('categories.index')->middleware('permission:view category');
    Route::post('/', 'CategoryController@store')->name('categories.store')->middleware('permission:new category');
    Route::get('/{id}', 'CategoryController@show')->where('id', '[0-9]+')->name('categories.show')->middleware('permission:view category');
    Route::post('/update/{id}', 'CategoryController@update')->name('categories.update')->middleware('permission:update category');
    Route::delete('/{id}', 'CategoryController@destroy')->middleware('permission:delete category');

    Route::get('/trash', 'CategoryController@trash')->name('categories.trash');
    Route::get('/trash-delete-all', 'CategoryController@trashDeleteAll')->name('categories.trash.deleteAll');
    Route::get('/trash-restore-all', 'CategoryController@trashRestoreAll')->name('categories.trash.restore.all');
    Route::post('/trash-delete/{slug}', 'CategoryController@trashDelete')->name('categories.trash.delete');
    Route::post('/trash-restore/{slug}', 'CategoryController@trashRestore')->name('categories.trash.restore');
});

