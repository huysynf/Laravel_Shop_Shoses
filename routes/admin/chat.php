<?php
Route::group(['prefix'=>'chats'],function (){
    Route::get('/', 'ChatController@index')->name('chats.index');
});

