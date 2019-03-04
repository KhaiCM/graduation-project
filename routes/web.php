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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\ProvinceController@index');
    Route::get('/province', 'Admin\ProvinceController@index')->name('adminHome');
    Route::group(['prefix' => 'province'], function () {
        Route::get('/index', 'Admin\ProvinceController@index')->name('province.index');
        Route::get('/create', 'Admin\ProvinceController@create')->name('province.create');
        Route::post('/create', 'Admin\ProvinceController@store');
        Route::get('/edit/{id}', 'Admin\ProvinceController@edit')->name('province.edit');
        Route::post('/edit/{id}', 'Admin\ProvinceController@update');
        Route::get('/destroy/{id}', 'Admin\ProvinceController@destroy')->name('province.destroy');
    });
    Route::get('/district', 'Admin\DistrictController@index');
    Route::group(['prefix' => 'district'], function () {
        Route::get('/index', 'Admin\DistrictController@index')->name('district.index');
        Route::get('/create', 'Admin\DistrictController@create')->name('district.create');
        Route::post('/create', 'Admin\DistrictController@store');
        Route::get('/edit/{id}', 'Admin\DistrictController@edit')->name('district.edit');
        Route::post('/edit/{id}', 'Admin\DistrictController@update');
        Route::get('/destroy/{id}', 'Admin\DistrictController@destroy')->name('district.destroy');
    });
});

Route::get('blogcatlist', 'BlogCatController@getList');

Route::get('addblogcat', 'BlogCatController@addblogcat');
Route::post('addblogcat', 'BlogCatController@postblogcat');


Route::get('editblogcat/{id}', 'BlogCatController@geteditlogcat');
Route::post('editblogcat/{id}', 'BlogCatController@posteditblogcat');

Auth::routes();

Route::get('/', 'HomeController@getHome');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register') ->name('register');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
