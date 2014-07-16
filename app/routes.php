<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});
Route::get('/video/{id}',function($id){
	return View::make('video')->with('vendor', Vendor::find($id));
});
Route::get('/map/{id}',function($id){
	return View::make('map')->with('vendor', Vendor::find($id));
});
Route::get('list-vendor', function(){
	return View::make('list-vendor');
});

Route::get('list-vendor-list', function(){
	return View::make('list-vendor-list');
});

Route::get('detail-vendor', function(){
	return View::make('detail-vendor');
});
Route::post('/', array('as'=>'home-page',"uses"=>"VendorController@search"));