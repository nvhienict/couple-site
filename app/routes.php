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

		$view = View::make('user-login');
		if(!Session::has('email')){
			return Response::make($view);
		}
	});


Route::get("main",array("before"=>"check_login", "as"=>"main","uses"=>"UserController@index"));

Route::get('/video/{id}',function($id){
	return View::make('video')->with('vendor', Vendor::find($id));
});
Route::get('/map/{id}',function($id){
	return View::make('map')->with('vendor', Vendor::find($id));
});

/**
* Route vendor
*
*
**/


Route::get('list-vendor',array('as'=>'list-vendor', function(){
	 return View::make('list-vendor');
}));

// get location create session display on form seacrh
Route::post('get_location', array('as'=>'get_location', function(){
	$id = Input::get('id');
	Session::put('location',$id);
}));

Route::get('gh', function(){
	return "location la: ".Session::get('location');
});

Route::get('category-vendor',array('as'=>'category-vendor', "uses"=>"VendorController@index"));

Route::get('category/{id}', array('as'=>'category', "uses"=>"VendorController@category"));


Route::get('list-vendor/search', array('as'=>'home-page',"uses"=>"VendorController@search"));

Route::get('compare',array("as"=>"compare", "uses"=>"VendorController@post_Compare"));

Route::post('check_vendor_compare',array("as"=>"check_vendor_compare", "uses"=>"VendorController@post_AddCompare"));

Route::post('remove_vendor_compare/{id}',array("as"=>"remove_vendor_compare", "uses"=>"VendorController@post_RemoveCompare"));

Route::get('vendor/{id}', array('as'=>'vendor', 'uses'=>'VendorController@show'));

Route::post('vendor_comment/{id_vendor}', array("as"=>"vendor_comment", "uses"=>"VendorController@vendor_comment"));

Route::get('vendor/{id}/comments', array("before"=>"check_login", 'as'=>'cmt_vendor', 'uses'=>'VendorController@show'));

Route::get('vendor/{id}/reviews', array("before"=>"check_login", 'as'=>'reviews', 'uses'=>'VendorController@show'));

Route::post('vendor/rating',array('as'=>'rating','uses'=>'VendorController@ratingVendor'));
/* End Route vendor */



Route::get('about',array('as'=>'about',function(){
	return View::make('about');
}));
Route::get('work',array('as'=>'work',function(){
	return View::make('work');
}));
Route::get('question',array('as'=>'question',function(){
	return View::make('question');
}));

Route::get('wedding',array('as'=>'wedding',function(){
	return View::make('wedding');
}));
Route::get('birthday',array('as'=>'birthday',function(){
	return View::make('birthday');
}));
Route::get('event',array('as'=>'event',function(){
	return View::make('event');
}));
Route::get('product',array('as'=>'product',function(){
	return View::make('product');
}));

Route::get('sortBy/{name}',array("before"=>"check_login","as"=>"sortby","uses"=>"ChecklistController@sortBy"));
Route::get("user-checklist", array("before"=>"check_login","as"=>"user-checklist", "uses"=>"ChecklistController@get_UserChecklist"));

Route::get("user-checklist/category", array("before"=>"check_login","as"=>"user-checklist-category", "uses"=>"ChecklistController@get_UserChecklist_category"));

Route::post('search/{month}',array('as'=>'search','uses'=>'ChecklistController@search'));

Route::post('get-id',array("as"=>"get-id","uses"=>"ChecklistController@getId"));

Route::post('delete-id',array("as"=>"delete-id","uses"=>"ChecklistController@deleteId"));

Route::get('exportfile',array("as"=>"exportfile", "uses"=>"ChecklistController@exportfile"));

// Thuy
Route::post("notes", array("as"=>"notes", "uses"=>"UserBudgetController@updateNote"));

Route::post('editActual',array('as'=>'editActual', 'uses'=>'UserBudgetController@editActual'));

Route::post('summaryActual',array('as'=>'summaryActual', 'uses'=>'UserBudgetController@summaryActual'));

Route::post('editPay',array('as'=>'editPay', 'uses'=>'UserBudgetController@editPay'));

Route::post('getData',array('as'=>'getData', 'uses'=>'UserBudgetController@getData'));

Route::post('totalCatPay',array('as'=>'totalCatPay', 'uses'=>'UserBudgetController@totalCatPay'));

Route::post('totalPay',array('as'=>'totalPay', 'uses'=>'UserBudgetController@totalPay'));

Route::post('editEstimate',array('as'=>'editEstimate', 'uses'=>'UserBudgetController@editEstimate'));


// user login
Route::get("logout",array("as"=>"logout","uses"=>"UserController@get_logout"));

Route::get('login', array("as"=>"login","uses"=>"UserController@get_login"));
Route::post('login',array("as"=>"login","uses"=>"UserController@post_login"));
Route::get("register",array('as'=>'register',"uses"=>"UserController@get_register"));
Route::post('register',array("as"=>"register","uses"=>"UserController@post_users"));
Route::post('check_user_email',array("as"=>"check_user_email","uses"=>"UserController@check_user_email"));

// Checklist --- Giang
Route::post("checklist/add", array("as"=>"add-checklist", "uses"=>"ChecklistController@post_Add_Checklist"));

Route::post("checklist/edit", array("as"=>"edit-checklist", "uses"=>"ChecklistController@post_Edit_Checklist"));

Route::post("check_task_add", array("as"=>"check_task_add", "uses"=>"ChecklistController@post_CheckTaskAdd"));

Route::post("check_task_edit/{id}", array("as"=>"check_task_edit", "uses"=>"ChecklistController@post_CheckTaskEdit"));

Route::get("check_task_del/{id}", array("as"=>"check_task_del", "uses"=>"ChecklistController@post_CheckTaskDel"));

Route::get("user-checklist", array("before"=>"check_login","as"=>"user-checklist", "uses"=>"ChecklistController@get_UserChecklist"));

Route::post('check_task_complete/{ac}', array("as"=>"check_task_complete", "uses"=>"ChecklistController@post_CheckTaskComplete"));
Route::post('check_Cat_complete/{ac}', array("as"=>"check_Cat_complete", "uses"=>"ChecklistController@post_CheckCatComplete"));


// ------ BUDGET -----Giang
Route::get('budget', array("before"=>"check_login","as"=>"budget","uses"=>"BudgetController@index"));

Route::get('creat_budget', function(){
	return View::make('creat_budget');
});
Route::post('money_budget', array('as'=>"money_budget", "uses"=>"BudgetController@post_MoneyBudget"));
//-------Budget CUong-----
Route::get('reset-budget', array("before"=>"check_login","as"=>"reset-budget","uses"=>"BudgetController@resetBudget"));
Route::post('budget/create',array('before'=>'check_login','as'=>'create','uses'=>'UserBudgetController@create'));
Route::post('budget/delete',array('as'=>'delete','uses'=>'UserBudgetController@delete'));
Route::post('budget/update',array('as'=>'update','uses'=>'UserBudgetController@update'));
// Route::post('budget/update1',array('as'=>'update1','uses'=>'ItemController@update1'));
// Route::post('budget/update2',array('as'=>'update2','uses'=>'ItemController@update2'));
Route::get('budget/exportfile',array("as"=>"exportfile", "uses"=>"UserBudgetController@exportfile"));

// PROFILE OF USER
Route::get('profile', array("before"=>"check_login", 'as'=>'profile', 'uses'=>'UserController@get_profile'));
Route::post('profile', array("before"=>"check_login", 'as'=>'profile', 'uses'=>'UserController@post_profile'));

Route::post('profile_password', array("before"=>"check_login", 'as'=>'profile_password', 'uses'=>'UserController@profile_password'));

Route::post('check_email_edit/{id}', array("before"=>"check_login", 'as'=>'check_email_edit', 'uses'=>'UserController@checkEmail'));

Route::post('check_pass_edit/{id}', array("before"=>"check_login", 'as'=>'check_pass_edit', 'uses'=>'UserController@checkPass'));

Route::post('update_avatar', array("before"=>"check_login", 'as'=>'update_avatar', 'uses'=>'UserController@update_avatar'));

Route::get('update_avatar', array("before"=>"check_login", 'as'=>'update_avatar', 'uses'=>'UserController@change_avatar'));

// SONGS
Route::get('songs/{id}', array('as'=>'songs', 'uses'=>'SongController@index'));

Route::get('songs/{id}/play-songs', array('as'=>'play_song', 'uses'=>'SongController@play'));

Route::post('song_comment/{id_song}',array('as'=>'song_comment', 'uses'=>'SongController@post_comment'));

Route::get('song/{id}/play-songs', array("before"=>"check_login", 'as'=>'cmt_song', 'uses'=>'SongController@play'));

//Guest list
Route::get('guest-list',array("before"=>"check_login",'as'=>'guest-list','uses'=>'GuestController@index'));

Route::post('check-email-guest',array('as'=>'check-email-guest','uses'=>'GuestController@check_guest_email'));
Route::post('guest-list/add-guest',array('as'=>'guest-list/add-guest','uses'=>'GuestController@post_Add_Guest'));
Route::post('guest-list/update_name',array('as'=>'update_name','uses'=>'GuestController@update_name'));
Route::post('guest-list/update_phone',array('as'=>'update_phone','uses'=>'GuestController@update_phone'));
Route::post('guest-list/update_address',array('as'=>'update_address','uses'=>'GuestController@update_address'));
Route::post('guest-list/update_email',array('as'=>'update_email','uses'=>'GuestController@update_email'));
Route::post('guest-list/update_attend',array('as'=>'update_attend','uses'=>'GuestController@update_attend'));
Route::post('guest-list/create',array('before'=>'check_login','as'=>'create_guest','uses'=>'GuestController@create'));
Route::post('guest-list/delete',array('before'=>'check_login','as'=>'delete_guest','uses'=>'GuestController@delete'));
Route::post('guest-list/update_invited1',array('as'=>'update_invited1','uses'=>'GuestController@update_invited1'));
Route::post('guest-list/update_invited2',array('as'=>'update_invited2','uses'=>'GuestController@update_invited2'));
Route::get('guest-list/exportfile',array("as"=>"guest-list/exportfile", "uses"=>"GuestController@exportfile"));
Route::post('check_group',array('as'=>'check_group','uses'=>'GuestController@check_group'));
// Group Thuỷ
Route::post("guest-list/add_group", array("as"=>"add_group", "uses"=>"GroupsController@post_Add_Group"));
Route::post("guest-list/edit_group", array("as"=>"edit_group", "uses"=>"GroupsController@post_edit_Group"));
Route::post("guest-list/delete_group", array("as"=>"delete_group", "uses"=>"GroupsController@post_delete_Group"));
Route::post("checkName", array("as"=>"checkName", "uses"=>"GroupsController@checkName"));


/**
* Website user
*
**/

Route::get('website', array('before'=>'check_login', 'as'=>'website', 'uses'=>'WebsiteController@index'));
Route::get('page_temp', array('before'=>'check_login', 'as'=>'page_temp', 'uses'=>'WebsiteController@create'));
Route::get('edit_page_temp', array('before'=>'check_login', 'as'=>'edit_page_temp', 'uses'=>'WebsiteController@edit'));

Route::get('website/edit/pages', array('before'=>'check_login', 'as'=>'website/edit/pages', 'uses'=>'WebsiteController@design'));
Route::get('upload',function(){
	return View::make('website_user.upload-images');
});

Route::post('change_font_website', array('before'=>'check_login', 'as'=>'change_font_website', 'uses'=>'WebsiteController@updateFontWebsite'));

Route::post('change_color_website1', array('before'=>'check_login', 'as'=>'change_color_website1', 'uses'=>'WebsiteController@updateColorWebsite1'));


/*** end website user ***/ 

