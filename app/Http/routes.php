<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('home/{view?}', 'homeController@index');

//product

//admin controller
Route::get('admin', 'adminController@index');
Route::get('admin/login/{result?}', 'adminController@login');
Route::post('admin/login', 'adminController@loginPost');
Route::get('admin/signup', 'adminController@signup');
Route::post('admin/signup', 'adminController@signupPost');
Route::get('admin/logout', 'adminController@logout');

Route::post('product/add', 'productController@productPost');
Route::post('product/brand', 'productController@brandPost');
Route::post('product/category', 'productController@categoryPost');

Route::get('product/view/{id}', 'productController@show');

Route::get('product/delete/{id}', 'productController@destroy');
Route::get('product/edit/{id}', 'productController@edit');
Route::post('product/edit', 'productController@editPost');

//error
Route::get('404',function(){
	return view('errors.404');
});
Route::get('500',function(){
	return view('errors.500');
});

