<?php
Route::group(['prefix'=>'categories'],function (){
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::post('/', 'CategoryController@store')->name('categories.store');
    Route::get('/{id}', 'CategoryController@show')->where('id', '[0-9]+')->name('categories.show');
    Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/{id}', 'CategoryController@destroy');

    Route::get('/trash', 'CategoryController@trash')->name('categories.trash');
    Route::get('/trash-delete-all', 'CategoryController@trashDeleteAll')->name('categories.trash.deleteAll');
    Route::get('/trash-restore-all', 'CategoryController@trashRestoreAll')->name('categories.trash.restore.all');
    Route::post('/trash-delete/{slug}', 'CategoryController@trashDelete')->name('categories.trash.delete');
    Route::post('/trash-restore/{slug}', 'CategoryController@trashRestore')->name('categories.trash.restore');
});

