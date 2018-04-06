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
	if (Auth::user()) {

        return Redirect::to("/home");

    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*suppliers*/
Route::get('/suppliers', 'ClientsController@index');
Route::get('/suppliers/create', 'ClientsController@create');
Route::post('/suppliers/store', 'ClientsController@store');
Route::get('/suppliers/edit/{id}', 'ClientsController@edit');
Route::post('/suppliers/update/{id}', 'ClientsController@update');
Route::get('/suppliers/delete/{id}', 'ClientsController@destroy');


/*categories*/
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/create', 'CategoriesController@create');
Route::post('/categories/store', 'CategoriesController@store');
Route::get('/categories/edit/{id}', 'CategoriesController@edit');
Route::post('/categories/update/{id}', 'CategoriesController@update');
Route::get('/categories/delete/{id}', 'CategoriesController@destroy');

/*items*/
Route::get('/products', 'ItemsController@index');
Route::get('/products/create', 'ItemsController@create');
Route::post('/products/store', 'ItemsController@store');
Route::get('/products/edit/{id}', 'ItemsController@edit');
Route::post('/products/update/{id}', 'ItemsController@update');
Route::get('/products/delete/{id}', 'ItemsController@destroy');
Route::get('/products/barcode/{id}', 'ItemsController@barcode');
Route::post('/products/barcode/{id}', 'ItemsController@displaybarcode');
