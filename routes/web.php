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
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('/login', 'AuthController@loginAdmin')->name('login');
        Route::get('/login', 'AuthController@login')->name('loginAdmin');
        Route::group(['middlware' => 'auth'], function () {
            Route::get('/', 'AuthController@home')->name('loginAdmin');
        });
    });
});
