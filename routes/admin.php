<?php

Route::group(['prefix' => 'admin'], function() {

    Route::get('login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.auth.login');
    Route::post('login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function(){
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'App\Http\Controllers\Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'App\Http\Controllers\Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix' => 'categories'], function() {

            Route::get('/', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'App\Http\Controllers\Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\Admin\CategoryController@delete')->name('admin.categories.delete');
        });

        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'App\Http\Controllers\Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'App\Http\Controllers\Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'App\Http\Controllers\Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'App\Http\Controllers\Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'App\Http\Controllers\Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'App\Http\Controllers\Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'App\Http\Controllers\Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'App\Http\Controllers\Admin\AttributeValueController@deleteValues');
        
        });

        Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'App\Http\Controllers\Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'App\Http\Controllers\Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'App\Http\Controllers\Admin\ProductController@update')->name('admin.products.update');

            Route::post('images/upload', 'App\Http\Controllers\Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'App\Http\Controllers\Admin\ProductImageController@delete')->name('admin.products.images.delete');
         
         });

        Route::group(['prefix' => 'brands'], function() {
            Route::get('/', 'App\Http\Controllers\Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'App\Http\Controllers\Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'App\Http\Controllers\Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'App\Http\Controllers\Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'App\Http\Controllers\Admin\BrandController@delete')->name('admin.brands.delete');
        });
    });

});