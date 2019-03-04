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

Route::get('blogcatlist', 'BlogCatController@getList');

Route::get('addblogcat', 'BlogCatController@addBlogCat')->name('addblogcat');
Route::post('addblogcat', 'BlogCatController@postAddBlogCat');


Route::get('editblogcat/{id}', 'BlogCatController@getEditBlogCat')->name('editblogcat');
Route::post('editblogcat/{id}', 'BlogCatController@postEditBlogCat');

Route::get('deleteblogcat/{id}', 'BlogCatController@getDeleteBlogCat')->name('deleteblogcat');

Auth::routes();

Route::get('/', 'HomeController@getHome');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
