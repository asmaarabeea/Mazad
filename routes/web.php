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
// Route::get('/', 'UserItemController@getAllProduct');
Route::get('/', "UserItemController@getAllProduct");
Route::post('/homepage',"UserProfileController@update");
Route::post('/product/{pid}', "UserItemController@sendEmail_updateProducts");
Route::get('/homepage',"UserItemController@getAllProduct");

Route::get('/product/{pid}', "UserItemController@show");

Route::group(["middleware"=>"auth"], function(){
	
	Route::get('/home', "UserItemController@index");
	Route::get('/home/{id}',"UserProfileController@index");
	Route::get('/homepage/{pid}',"UserItemController@show");
	
	Route::get('/product', "UserItemController@addItem");
	Route::get('/products','UserItemController@index');
	
	Route::get('/profile/{id}', 'UserProfileController@index');

	
	Route::post('/myitem','UserItemController@store');
	Route::get('/myitem','UserItemController@myItems');

	Route::post('/edit/{pid}','UserItemController@updateItem');
	Route::get('/edit/{pid}','UserItemController@editItem');
	
	Route::get('/delete/{pid}','UserItemController@deleteItems');

});

Auth::routes();
