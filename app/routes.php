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

Route::get("main",array("before"=>"check_login", "as"=>"main","uses"=>"UserController@index"));

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
Route::get('sortBy/{name}',array("before"=>"check_login","as"=>"sortby","uses"=>"ChecklistController@sortBy"));
Route::get("user-checklist", array("before"=>"check_login","as"=>"user-checklist", "uses"=>"ChecklistController@get_UserChecklist"));
Route::post('search/{month}',array('as'=>'search','uses'=>'ChecklistController@search'));

// Thuy
Route::post("notes", array("as"=>"notes", "uses"=>"UserBudgetController@updateNote"));
Route::post('editActual',array('as'=>'editActual', 'uses'=>'UserBudgetController@editActual'));
Route::post('summaryActual',array('as'=>'summaryActual', 'uses'=>'UserBudgetController@summaryActual'));
Route::post('editPay',array('as'=>'editPay', 'uses'=>'UserBudgetController@editPay'));
Route::post('getData',array('as'=>'getData', 'uses'=>'UserBudgetController@getData'));
Route::post('totalCatPay',array('as'=>'totalCatPay', 'uses'=>'UserBudgetController@totalCatPay'));
Route::post('totalPay',array('as'=>'totalPay', 'uses'=>'UserBudgetController@totalPay'));

// user login
Route::get("logout",array("as"=>"logout","uses"=>"UserController@get_logout"));

Route::get('login', array("as"=>"login","uses"=>"UserController@get_login"));
Route::post('login',array("as"=>"login","uses"=>"UserController@post_login"));
Route::get("register",array('as'=>'register',"uses"=>"UserController@get_register"));
Route::post('register',array("as"=>"register","uses"=>"UserController@post_users"));
Route::post('check_user_email',array("as"=>"check_user_email","uses"=>"UserController@check_user_email"));

// Checklist --- Giang

Route::post("checklist/add", array("before"=>"check_login","as"=>"add-checklist", "uses"=>"ChecklistController@post_Add_Checklist"));

Route::post("checklist/edit", array("before"=>"check_login","as"=>"edit-checklist", "uses"=>"ChecklistController@post_Edit_Checklist"));

Route::post("check_task_add", array("before"=>"check_login","as"=>"check_task_add", "uses"=>"ChecklistController@post_CheckTaskAdd"));

Route::post("check_task_edit/{id}", array("before"=>"check_login","as"=>"check_task_edit", "uses"=>"ChecklistController@post_CheckTaskEdit"));

Route::get("check_task_del/{id}", array("before"=>"check_login","as"=>"check_task_del", "uses"=>"ChecklistController@post_CheckTaskDel"));

Route::get("user-checklist", array("before"=>"check_login","as"=>"user-checklist", "uses"=>"ChecklistController@get_UserChecklist"));

Route::get('task_overdue', array("before"=>"check_login","as"=>"task_overdue","uses"=>"ChecklistController@get_Task_Overdue"));

Route::get('task_complete', array("before"=>"check_login","as"=>"task_complete","uses"=>"ChecklistController@get_Task_Complete"));

Route::post('check_task_complete/{ac}', array("before"=>"check_login","as"=>"check_task_complete", "uses"=>"ChecklistController@post_CheckTaskComplete"));

Route::get('export_checklist', array("before"=>"check_login","as"=>"export_checklist","uses"=>"ChecklistController@exportfile"));


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



