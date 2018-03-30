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
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
});
Route::get('/migrate', function() {
    Artisan::call('migrate');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/privacy-policy', 'HomeController@showPrivacyPolicy')->name('showPrivacyPolicy');
Route::get('/terms-and-conditions', 'HomeController@showTermsAndConditions')->name('showTermsAndConditions');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('serviceprovider/login', 'ServiceProviderController@loginServiceProvider')->name('loginServiceProvider');
    Route::get('serviceprovider/logout', 'ServiceProviderController@logout')->name('logoutServiceProvider');
    Route::post('serviceprovider/login', 'ServiceProviderController@login')->name('loginServiceProvider');
    Route::get('serviceprovider/', 'ServiceProviderController@registerServiceProvider')->name('registerServiceProvider');
    Route::post('serviceprovider/register', 'ServiceProviderController@addServiceProvider')->name('registerServiceProvider');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    Route::group(['namespace' => 'Category', 'as' => 'category.', 'prefix' => 'category/',], function () {
        Route::get('new', 'CategoryController@add_category')->name('add_category_view');
        Route::post('new', 'CategoryController@save_category')->name('save_category');
        Route::patch('update', 'CategoryController@update_category')->name('update_category');
        Route::get('{id}', 'CategoryController@get_category')->name('get_category');
        Route::get('/delete/{id}', 'CategoryController@delete_category')->name('delete_category');
    });
    Route::group(['namespace' => 'Product', 'as' => 'product.', 'prefix' => 'product/',], function () {
        Route::get('new', 'ProductController@add_product')->name('add_product_view');
        Route::post('new', 'ProductController@save_product')->name('save_product');
        Route::patch('update', 'ProductController@update_product')->name('update_product');
        Route::get('{id}', 'ProductController@get_product')->name('get_product');
        Route::get('/delete/{id}', 'ProductController@delete_product')->name('delete_product');
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'products/', 'as' => 'products.'], function () {
        Route::get('', 'ProductController@get_all_products')->name('get_all_products');
    });
    
    Route::group(['namespace' => 'Category', 'prefix' => 'categories/', 'as' => 'categories.'], function () {
        Route::get('', 'CategoryController@get_all_categories')->name('get_all_categories');
    });

    Route::group(['namespace' => 'Auth'], function () {
        Route::post('/login', 'AuthController@loginAdmin')->name('login');
        Route::get('/login', 'AuthController@login')->name('loginAdmin');
        Route::group(['middlware' => 'auth'], function () {
            Route::get('/', 'AuthController@home')->name('loginAdmin');
        });
    });
});
