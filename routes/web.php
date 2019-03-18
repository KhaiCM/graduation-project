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

Route::group(['prefix' => 'admin', 'middleware' => 'login.admin'], function () {
    Route::get('detail/{id}', 'Admin\UserController@edit')->name('user.detail');

    Route::put('detail/{id}', 'Admin\UserController@update')->name('user.update');

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
    Route::group(['prefix' => 'blogcat'], function () {
        Route::get('blogcatlist', 'BlogCatController@getList')->name('blogcat.index');
        Route::get('addblogcat', 'BlogCatController@addBlogCat')->name('addblogcat');
        Route::post('addblogcat', 'BlogCatController@postAddBlogCat');
        Route::get('editblogcat/{id}', 'BlogCatController@getEditBlogCat')->name('editblogcat');
        Route::post('editblogcat/{id}', 'BlogCatController@postEditBlogCat');
        Route::get('deleteblogcat/{id}', 'BlogCatController@getDeleteBlogCat')->name('deleteblogcat');
    });
    Route::group(['prefix' => 'blog'], function () {
        Route::get('bloglist', 'BlogController@getList')->name('blog.index');
        Route::get('addblog', 'BlogController@addBlog')->name('addblog');
        Route::post('addblog', 'BlogController@postAddBlog');
        Route::get('editblog/{id}', 'BlogController@getEditBlog')->name('editblog');
        Route::post('editblog/{id}', 'BlogController@postEditBlog');
        Route::get('deleteblog/{id}', 'BlogController@getDeleteBlog')->name('deleteblog');
    });
    Route::group(['prefix' => 'contract'], function () {
        Route::get('contractlist', 'ContractController@getlist')->name('contract.index');
    });
    Route::group(['prefix' => 'contact'], function () {
        Route::get('contactlist', 'ContactController@getlist')->name('contact.index');
        Route::get('deletecontact/{id}', 'ContactController@getDeleteContact')->name('deletecontact');
    });
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'Product\HomeController@index')->name('home');

    Route::get('/prosold', 'Product\HomeController@getProSold')->name('home.sold');

    Route::get('/property/view/{id}', 'Product\HomeController@find')->name('property.view');

    Route::get('/prorent', 'Product\HomeController@getProRent')->name('home.rent');

    Route::get('/news', 'PostController@getPost')->name('post.index');

    Route::get('/news/{id}', 'PostController@getPostById')->name('post.view');

    Route::post('/news/{id}/comment', 'Product\HomeController@comment')->name('property.comment');
});

//user page
Auth::routes();

Route::get('user-page/{id}', 'UserPageController@edit')->name('user_page.edit');

Route::put('user-page/{id}', 'UserPageController@update')->name('user_page.update');

Route::get('change-pass/{id}', 'UserPageController@getChangePass')->name('user.change_pass');

Route::put('change-pass/{id}', 'UserPageController@postChangePass')->name('user.post_change');

//property
Route::get('myproperty/{id}', 'PropertyController@show')->name('property.show');

Route::get('property', 'PropertyController@create')->name('property');

Route::post('property', 'PropertyController@store')->name('property.create');

Route::get('editproperty/{id}', 'PropertyController@edit')->name('property.edit');

Route::put('editproperty/{id}', 'PropertyController@update')->name('property.update');

Route::get('destroy/{id}', 'PropertyController@destroy')->name('property.delete');

Route::group(['prefix' => 'ajax'], function () {
    Route::get('province/{province_id}', 'AjaxController@getDistrict');

    Route::get('property_category/{property_category_id}', 'AjaxController@getPropertyType');
});

//set_calendar
Route::get('calendar/{id}', 'SetCalenderController@create')->name('createcalendar');
Route::post('calendar/{id}', 'SetCalenderController@postcreate')->name('postcreatecalendar');

Route::get('setcalendarlist', 'SetCalenderController@getlist')->name('setcalendar.index');
Route::get('deletecalendar/{id}', 'SetCalenderController@getDelete')->name('deletecalendar');
