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

/*items*/
Route::get('/stocks', 'StocksController@index');
Route::get('/stocks/create', 'StocksController@create');
Route::post('/stocks/store', 'StocksController@store');
Route::get('/stocks/edit/{id}', 'StocksController@edit');
Route::post('/stocks/update/{id}', 'StocksController@update');
Route::get('/stocks/delete/{id}', 'StocksController@destroy');

/*profile*/
Route::get('profile', 'ProfileController@index');
Route::get('profile/edit/{id}', 'ProfileController@edit');
Route::get('profile/editpassword/{id}', 'ProfileController@editpassword');
Route::post('profile/update/{id}', 'ProfileController@update');
Route::post('profile/updatepassword/{id}', 'ProfileController@updatepassword');

/*organization*/
Route::get('organizations', 'OrganizationsController@index');
Route::post('organizations/update/{id}', 'OrganizationsController@update');
Route::get('settings', 'OrganizationsController@settings');
Route::post('settings/update/{id}', 'OrganizationsController@settingsupdate');

/*orders*/
Route::get('sales', 'OrdersController@index');
Route::post('sales/create', 'OrdersController@create');
Route::post('sales/store', 'OrdersController@store');
Route::get('orderitems/edit/{id}', 'OrdersController@edit');
Route::post('orderitems/edit/{id}', 'OrdersController@update');
Route::get('orderitems/remove/{id}', 'OrdersController@remove');