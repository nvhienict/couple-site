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

Route::get('/',array("as"=>"index", function()
{
	return View::make('index');
}));

Route::filter("check_login", function(){
		if(!Session::has("email"))
			return Redirect::to("login");
	});

Route::get("main",array("before"=>"check_login", "as"=>"main","uses"=>"UserContronller@index"));

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

Route::post('list-vendor', array('as'=>'home-page',"uses"=>"VendorController@search"));

Route::get('detail-vendor/{id}',array('as'=>'detail-vendor',"uses"=>"VendorController@show"));

Route::post('compare',array("as"=>"compare", function(){
	foreach(Vendor::get() as $vendor){
		if(Input::get('checkbox-'.$vendor->id)==$vendor->id)
		{
			 $compare[]=Input::get('checkbox-'.$vendor->id);
		}
	}
	return View::make('compare')->with('results',$compare);
}));
/*Cuong*/
Route::get('user-checklist',array('as'=>'user-checklist', function(){
	 return View::make('user-checklist');
}));

// Thuy
// user login
Route::get("logout",array("as"=>"logout","uses"=>"UserContronller@get_logout"));

Route::get('login', array("as"=>"login","uses"=>"UserContronller@get_login"));
Route::post('user_login',array("as"=>"user_login","uses"=>"UserContronller@post_login"));