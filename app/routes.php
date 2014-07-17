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
Route::get('compare', function(){
	return View::make('compare');
});
Route::get('list-vendor',array('as'=>'list-vendor', function(){
	 return View::make('list-vendor');
}));

Route::get('list-vendor-display/{display}',array('as'=>'list-vendor-display', function($display){
	 return View::make('list-vendor-display')->with('display', $display);
}));

Route::get('detail-vendor', function(){
	$vendor=Session::get('vendor');
	return View::make('detail-vendor')->with("vendor",$vendor);
});
Route::post('list-vendor', array('as'=>'home-page',"uses"=>"VendorController@search"));

Route::get('show-id/{id}',array('as'=>'home-page',"uses"=>"VendorController@show"));