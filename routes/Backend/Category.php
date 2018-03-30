<?php

Route::group(['namespace' => 'Category', 'as' => 'category.', 'prefix' => 'category/',], function () {
    Route::get('new', 'CategoryController@add_category')->name('add_category_view');
    Route::post('new', 'CategoryController@save_category')->name('save_category');
    Route::patch('update', 'CategoryController@update_category')->name('update_category');
    Route::get('{id}', 'CategoryController@get_category')->name('get_category');
    Route::get('/delete/{id}', 'CategoryController@delete_category')->name('delete_category');
});

Route::group(['namespace' => 'Category', 'prefix' => 'categories/', 'as' => 'categories.'], function () {
    Route::get('', 'CategoryController@get_all_categories')->name('get_all_categories');
});