<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
   [
       'register' => false,
       'verify' => true,
       'reset' => false,
       'login' => false,
   ]
);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'manage','middleware'=>'auth'], function () {
    include_route_files(__DIR__.'/admin/');
});

Route::group(['namespace' => 'Auth', 'prefix' => 'manage'], function () {
    Route::get('/login','LoginController@showLoginForm')->name('manage.getLogin');
    Route::post('/login','LoginController@Login')->name('manage.login');
});
Route::get('/login',function (){
   abort(404);
});
