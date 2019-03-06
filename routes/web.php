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
    Route::get('/province', 'Admin\ProvinceController@index')->name('adminHome');
    Route::group(['prefix' => 'province'], function () {
        Route::get('/index', 'Admin\ProvinceController@index')->name('province.index');
        Route::get('/create', 'Admin\ProvinceController@create')->name('province.create');
        Route::post('/create', 'Admin\ProvinceController@store');
        Route::get('/edit/{id}', 'Admin\ProvinceController@edit')->name('province.edit');
        Route::post('/edit/{id}', 'Admin\ProvinceController@update');
        Route::get('/destroy/{id}', 'Admin\ProvinceController@destroy')->name('province.destroy');
    });
    Route::get('district', 'Admin\DistrictController@index');
    Route::group(['prefix' => 'district'], function () {
        Route::get('/index', 'Admin\DistrictController@index')->name('district.index');
        Route::get('/create', 'Admin\DistrictController@create')->name('district.create');
        Route::post('/create', 'Admin\DistrictController@store');
        Route::get('/edit/{id}', 'Admin\DistrictController@edit')->name('district.edit');
        Route::post('/edit/{id}', 'Admin\DistrictController@update');
    });
});

Route::get('blogcatlist', 'BlogCatController@getList');

Route::get('addblogcat', 'BlogCatController@addBlogCat')->name('addblogcat');
Route::post('addblogcat', 'BlogCatController@postAddBlogCat');


Route::get('editblogcat/{id}', 'BlogCatController@getEditBlogCat')->name('editblogcat');
Route::post('editblogcat/{id}', 'BlogCatController@postEditBlogCat');

Route::get('deleteblogcat/{id}', 'BlogCatController@getDeleteBlogCat')->name('deleteblogcat');

Route::get('bloglist', 'BlogController@getList');

Route::get('addblog', 'BlogController@addBlog')->name('addblog');
Route::post('addblog', 'BlogController@postAddBlog');


Route::get('editblog/{id}', 'BlogController@getEditBlog')->name('editblog');
Route::post('editblog{id}', 'BlogController@postEditBlog');

Route::get('deleteblog/{id}', 'BlogController@getDeleteBlog')->name('deleteblog');

Auth::routes();

Route::get('/', 'HomeController@getHome');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
