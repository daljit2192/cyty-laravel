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
    Route::get('serviceprovider/register', 'ServiceProviderController@registerServiceProvider')->name('registerServiceProvider');
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
    Route::group(['namespace' => 'JobCategory', 'as' => 'jobcategory.', 'prefix' => 'jobcategory/',], function () {
        Route::get('new', 'JobCategoryController@add_job_category')->name('add_job_category_view');
        Route::post('new', 'JobCategoryController@save_job_category')->name('save_job_category');
        Route::patch('update', 'JobCategoryController@update_job_category')->name('update_job_category');
        Route::get('{id}', 'JobCategoryController@get_job_category')->name('get_job_category');
        Route::get('/delete/{id}', 'JobCategoryController@delete_job_category')->name('delete_job_category');
    });
    Route::group(['namespace' => 'Product', 'as' => 'product.', 'prefix' => 'product/',], function () {
        Route::get('new', 'ProductController@add_product')->name('add_product_view');
        Route::post('new', 'ProductController@save_product')->name('save_product');
        Route::patch('update', 'ProductController@update_product')->name('update_product');
        Route::get('{id}', 'ProductController@get_product')->name('get_product');
        Route::get('/delete/{id}', 'ProductController@delete_product')->name('delete_product');
    });
    Route::group(['namespace' => 'Client', 'as' => 'client.', 'prefix' => 'client/',], function () {
        Route::get('new', 'ClientController@add_client')->name('add_client_view');
        Route::post('new', 'ClientController@save_client')->name('save_client');
        Route::patch('update', 'ClientController@update_client')->name('update_client');
        Route::get('{id}', 'ClientController@get_client')->name('get_client');
        Route::get('/delete/{id}', 'ClientController@delete_client')->name('delete_client');
    });
    Route::group(['namespace' => 'Job', 'as' => 'job.', 'prefix' => 'job/',], function () {
        Route::get('new', 'JobController@add_job')->name('add_job_view');
        Route::post('new', 'JobController@save_job')->name('save_job');
        Route::patch('update', 'JobController@update_job')->name('update_job');
        Route::get('{id}', 'JobController@get_job')->name('get_job');
        Route::get('/delete/{id}', 'JobController@delete_job')->name('delete_job');
    });
    Route::group(['namespace' => 'ServiceProvider', 'as' => 'serviceprovider.', 'prefix' => 'serviceprovider/',], function () {
        Route::get('new', 'ServiceProviderController@add_service_provider')->name('add_service_provider_view');
        Route::post('new', 'ServiceProviderController@save_service_provider')->name('save_service_provider');
        Route::patch('update', 'ServiceProviderController@update_service_provider')->name('update_service_provider');
        Route::get('{id}', 'ServiceProviderController@get_service_provider')->name('get_service_provider');
        Route::get('/delete/{id}', 'ServiceProviderController@delete_service_provider')->name('delete_service_provider');
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'products/', 'as' => 'products.'], function () {
        Route::get('', 'ProductController@get_all_products')->name('get_all_products');
    });
    
    Route::group(['namespace' => 'Category', 'prefix' => 'categories/', 'as' => 'categories.'], function () {
        Route::get('', 'CategoryController@get_all_categories')->name('get_all_categories');
    });
    
    Route::group(['namespace' => 'JobCategory', 'prefix' => 'jobcategories/', 'as' => 'jobcategories.'], function () {
        Route::get('', 'JobCategoryController@get_all_job_categories')->name('get_all_job_categories');
    });
    
    Route::group(['namespace' => 'Client', 'prefix' => 'clients/', 'as' => 'clients.'], function () {
        Route::get('', 'ClientController@get_all_clients')->name('get_all_clients');
    });
    
    Route::group(['namespace' => 'Job', 'prefix' => 'jobs/', 'as' => 'jobs.'], function () {
        Route::get('', 'JobController@get_all_jobs')->name('get_all_jobs');
    });

    Route::group(['namespace' => 'ServiceProvider', 'prefix' => 'serviceproviders/', 'as' => 'serviceprovider.'], function () {
        Route::get('', 'ServiceProviderController@get_all_service_providers')->name('get_all_service_provider');
    });

    Route::group(['namespace' => 'Auth'], function () {
        Route::post('/login', 'AuthController@loginAdmin')->name('login');
        Route::get('/login', 'AuthController@login')->name('loginAdmin');
        Route::get('/logout', 'AuthController@logout')->name('logoutAdmin');
        Route::group(['middlware' => 'auth'], function () {
            Route::get('/', 'AuthController@home')->name('loginAdmin');
        });
    });
});
