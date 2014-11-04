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

Route::get('index',array("as"=>"index", function()
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


Route::get('category-vendor',array('as'=>'category-vendor', "uses"=>"VendorController@index"));

Route::get('vendor/{slug_cate}', array('as'=>'category', "uses"=>"VendorController@category"));


Route::get('list-vendor/search', array('as'=>'home-page',"uses"=>"VendorController@search"));

Route::get('compare',array("as"=>"compare", "uses"=>"VendorController@post_Compare"));

Route::post('check-vendor_compare',array("as"=>"check_vendor_compare", "uses"=>"VendorController@post_AddCompare"));

Route::post('remove-vendor_compare/{id}',array("as"=>"remove_vendor_compare", "uses"=>"VendorController@post_RemoveCompare"));

Route::get('vendor/{slug_cate}/{slug_vendor}', array('as'=>'vendor', 'uses'=>'VendorController@show'));

Route::post('vendor-comment/{id_vendor}', array("as"=>"vendor_comment", "uses"=>"VendorController@vendor_comment"));

Route::get('comment-vendor/{slug_cate}/{slug_vendor}', array("before"=>"check_login", 'as'=>'cmt_vendor', 'uses'=>'VendorController@show'));

Route::get('reviews/{slug_cate}/{slug_vendor}', array("before"=>"check_login", 'as'=>'reviews', 'uses'=>'VendorController@show'));

Route::post('vendor/rating',array('as'=>'rating','uses'=>'VendorController@ratingVendor'));
/* End Route vendor */





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
Route::post('budget/get_budget',array('as'=>'get_budget','uses'=>'UserBudgetController@get_budget'));
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

Route::get('songs/{slug}', array('as'=>'songs', 'uses'=>'SongController@index'));

Route::get('songs/{slug}/{slug_song}', array('as'=>'play_song', 'uses'=>'SongController@play'));

Route::post('song-comment/{id}',array('as'=>'song_comment', 'uses'=>'SongController@post_comment'));

Route::get('comment-song/{slug_cat}/{slug_song}', array("before"=>"check_login", 'as'=>'cmt_song', 'uses'=>'SongController@play'));

//Guest list
Route::get('guest-list',array("before"=>"check_login",'as'=>'guest-list','uses'=>'GuestController@index'));
Route::post('sum_attending',array("as"=>"sum_attending","uses"=>"GuestController@sumAttending"));
Route::post('check-email-guest',array('as'=>'check-email-guest','uses'=>'GuestController@check_guest_email'));
Route::post('guest-list/add-guest',array('as'=>'guest-list/add-guest','uses'=>'GuestController@post_Add_Guest'));
Route::post('guest-list/update_name',array('as'=>'update_name','uses'=>'GuestController@update_name'));
Route::post('guest-list/update_phone',array('as'=>'update_phone','uses'=>'GuestController@update_phone'));
Route::post('guest-list/update_address',array('as'=>'update_address','uses'=>'GuestController@update_address'));
Route::post('guest-list/update_email',array('as'=>'update_email','uses'=>'GuestController@update_email'));
Route::post('guest-list/create',array('before'=>'check_login','as'=>'create_guest','uses'=>'GuestController@create'));
Route::post('guest-list/delete',array('before'=>'check_login','as'=>'delete_guest','uses'=>'GuestController@delete'));
Route::post('guest-list/update_invited1',array('as'=>'update_invited1','uses'=>'GuestController@update_invited1'));
Route::post('guest-list/update_invited2',array('as'=>'update_invited2','uses'=>'GuestController@update_invited2'));
Route::get('guest-list/exportfile',array("as"=>"guest-list/exportfile", "uses"=>"GuestController@exportfile"));
Route::post('check_group',array('as'=>'check_group','uses'=>'GuestController@check_group'));
// Group Thuỷ
Route::post("guest-list/add_group", array("as"=>"add_group", "uses"=>"GuestController@post_Add_Group"));
Route::post("guest-list/edit_group", array("as"=>"edit_group", "uses"=>"GuestController@post_edit_Group"));
Route::post("sent-name-edit",array("as"=>"sent-name-edit","uses"=>"GuestController@sentNameGroupEdit"));
Route::post("guest-list/delete_group", array("as"=>"delete_group", "uses"=>"GuestController@post_delete_Group"));
Route::post("sent-name-group",array("as"=>"sent-name-group","uses"=>"GuestController@sentNameGroup"));
Route::post("checkName", array("as"=>"checkName", "uses"=>"GuestController@checkName"));
Route::post('get_guest',array('as'=>'get_guest','uses'=>'GuestController@get_guest'));


/**
* Website user
*
**/

Route::group(array('before'=>'check_login'), function(){

	// all Route for website user here

	// choose template
	Route::get('template', array('as'=>'template', 'uses'=>'WebsiteController@template'));
	Route::get('template-website/{id}', array('as'=>'template-website', 'uses'=>'WebsiteController@design'));

	Route::get('website', array('as'=>'website', 'uses'=>'WebsiteController@index'));
	Route::get('page_temp', array('as'=>'page_temp', 'uses'=>'WebsiteController@template_1'));
	Route::get('{id}/view-previous', array('as'=>'view-previous', 'uses'=>'WebsiteController@viewPrevious'));

	Route::get('website/edit/pages', array('as'=>'website/edit/pages', 'uses'=>'WebsiteController@editPage'));

	Route::post('change_font_website', array('as'=>'change_font_website', 'uses'=>'WebsiteController@updateFontWebsite'));

	Route::post('change_style_website', array('as'=>'change_style_website', 'uses'=>'WebsiteController@updateStyleWebsite'));

	Route::post('change_color_website1', array('as'=>'change_color_website1', 'uses'=>'WebsiteController@updateColorWebsite1'));
	Route::post('change_color_website2', array('as'=>'change_color_website2', 'uses'=>'WebsiteController@updateColorWebsite2'));
	Route::post('change_color_website3', array('as'=>'change_color_website3', 'uses'=>'WebsiteController@updateColorWebsite3'));

	Route::post('reset_color', array('as'=>'reset_color', 'uses'=>'WebsiteController@resetColor'));
	Route::post('upload-background',array('as'=>'upload','uses'=>'WebsiteController@updateImagebackground'));
	Route::post('change-image-tab',array('as'=>'change-image-tab','uses'=>"WebsiteController@changeImage"));
	Route::post('get-id-tab', array('as'=>'get-id-tab', 'uses'=>'WebsiteController@getTab'));//lấy dữ liệu của 1 tab
	Route::post('update-title', array('as'=>'update-title', 'uses'=>'WebsiteController@Post_update_Tab'));
	Route::post('delete-title', array('as'=>'delete-title', 'uses'=>'WebsiteController@delete_tab'));
	Route::post('addTopic', array('as'=>'addTopic', 'uses'=>'WebsiteController@addTopic'));
	Route::post('add_section', array('as'=>'add_section', 'uses'=>'WebsiteController@addSection'));
	Route::post('reSort', array('as'=>'reSort', 'uses'=>'WebsiteController@reSort'));
	Route::post('sortable', array('as'=>'sortable', 'uses'=>'WebsiteController@sortable'));
	// kéo thả chuột để sắp xếp lại
	Route::post('update-content', array('as'=>'update_content_tab', 'uses'=>'WebsiteController@update'));

	// template 2
	Route::get('template-tab', array('as'=>'template-tab', 'uses'=>'WebsiteController@templateTabIndex'));
	Route::get('change_temp', array('as'=>'change_temp', 'uses'=>'WebsiteController@changeTemp'));
	Route::post('update_about_groom', array('as'=>'update_about_groom', 'uses'=>'WebsiteController@updateAboutGroom'));
	Route::post('update_about_bride', array('as'=>'update_about_bride', 'uses'=>'WebsiteController@updateAboutBride'));
	Route::post('updateName', array('as'=>'updateName', 'uses'=>'WebsiteController@updateName'));
	
	// end template 2

	// template 3
	Route::get('template-tab', array('as'=>'template-tab', 'uses'=>'WebsiteController@templateTabIndex'));
	Route::get('change_temp', array('as'=>'change_temp', 'uses'=>'WebsiteController@changeTemp'));
	Route::post('update_about_groom', array('as'=>'update_about_groom', 'uses'=>'WebsiteController@updateAboutGroom'));
	Route::post('update_about_bride', array('as'=>'update_about_bride', 'uses'=>'WebsiteController@updateAboutBride'));
	Route::post('updateName', array('as'=>'updateName', 'uses'=>'WebsiteController@updateName'));
	
	// end template 3


	// Upload Album
	Route::post('up_images_album',array('as'=>'up_images_album','uses'=>"WebsiteController@up_images_album"));
	Route::post('load_album',array('as'=>'load_album','uses'=>"WebsiteController@load_album"));
	Route::post('del_album',array('as'=>'del_album','uses'=>"WebsiteController@del_album"));
	Route::post('change_url',array('as'=>'change_url','uses'=>"WebsiteController@change_url"));
	Route::post('load_url',array('as'=>'load_url','uses'=>'WebsiteController@load_url'));
	Route::post('check_image_album',array('as'=>'check_image_album','uses'=>'WebsiteController@checkImageAlbum'));
	

	// start time count down
	Route::post('time_count_down', array('as'=>'time_count_down','uses'=>"WebsiteController@timeCountDown"));
	// end time count down
	
	//change Map//
	Route::post('change-map',array('as'=>'change-map','uses'=>"WebsiteController@changeMap"));

	// infor about groom and update_about_bride

	Route::post('update_infor',array('as'=>'update_infor','uses'=>'WebsiteController@update_infor'));
	Route::post('getInfor',array('as'=>'getInfor','uses'=>'WebsiteController@getInfor'));
	
});

Route::get('website/{url}',array('as'=>'url_website','uses'=>"WebsiteController@url_website"));


Route::get('login/facebook', array("as" => "facebook", "uses" => "UserController@loginFacebook"));

Route::post('change_weddingdate', array("as" => "change_weddingdate", "uses" => "UserController@loginFacebookUpdate"));

// upload images ajax
Route::post('upload_images', array(
	"as" => "upload_images",
	"uses" =>"WebsiteController@upload_images_ajax"
	)
);
// end upload images ajax
// documents

Route::get('introduce',array('as'=>'introduce',function(){
	return View::make('documents.introduce');
}));
Route::get('term',array('as'=>'term',function(){
	return View::make('documents.term');
}));
Route::get('policy',array('as'=>'policy',function(){
	return View::make('documents.policy');
}));
Route::get('question',array('as'=>'question',function(){
	return View::make('documents.question');
}));
Route::get('contact',array('as'=>'contact',function(){
	return View::make('documents.contact');
}));
Route::get('sitemap',array('as'=>'sitemap',function(){
	return View::make('documents.sitemap');
}));

// end documents


