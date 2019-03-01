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
Route::get('home', 'HomeController@getHome');
Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'ProvinceController@index')->name('adminHome');
    Route::group(['prefix' => 'province'], function () {
        Route::get('/index', 'ProvinceController@index')->name('province.index');
        Route::get('/create', 'ProvinceController@create')->name('province.create');
        Route::post('/create', 'ProvinceController@store');
        Route::get('/edit/{id}', 'ProvinceController@edit')->name('province.edit');
        Route::post('/edit/{id}', 'ProvinceController@update');
        Route::get('/destroy/{id}', 'ProvinceController@destroy')->name('province.destroy');
    });
});
