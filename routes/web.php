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

//Vendor Routes
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::post('/products/{id}/upload-images', 'ProductsController@uploadImages')->name('products.upload-images');
    Route::resource('products', 'ProductsController');
});

//Admin Routes
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['admin', 'auth']
], function () {
    Route::get('admins', 'UsersController@admins')->name('admins');
    Route::get('admins.json', 'UsersController@adminsJson')->name('admins.json');
    Route::get('admins-vue', function() {
        return view('admin.admins.vue');
    })->name('admins-vue');
    Route::get('users/{id}/products', 'UsersController@products')->name('users.products');
    Route::resource('users', 'UsersController');
    Route::resource('pages', 'PagesController');
    Route::resource('reviews', 'ReviewsController');
});


//Frontend Routes
Route::get('/', 'PageController@index')->name('home');
Route::get('/{url}/page', 'PageController@page')->name('page');
Route::any('{name}-{id}', ['as' => 'product.show', 'uses' => 'PageController@product'])
    ->where('name', '^([^\/]+)')
    ->where('id', '([0-9]+)$');
Route::get('browse', 'PageController@browse')->name('browse');

Route::post('/review', 'Admin\ReviewsController@store')->name('review.store');
//Auth Routes
Auth::routes();

//Dashboard Route
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Controller@index')->name('dashboard');
    Route::get('/account', 'Controller@account')->name('account');
    Route::put('/account/update', 'Controller@updateAccount')->name('account.update');
});

Route::post('/upload-images', 'ImagesController@upload')->name('images.upload');
Route::resource('images', 'ImagesController');
