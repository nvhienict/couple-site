<?php

class GroupsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function post_Add_Group(){

			$id_user = ChecklistController::id_user();

		    $rules=array(
				"name"=>"required"
			);
		    // check then insert to database
			if(!Validator::make(Input::all(),$rules)->fails()){
				$group = new Groups();
				$group->name = Input::get('name');
				$group->save();
				
				$msg="Đã tạo nhóm thành công!";
				return Redirect::route("guest-list")->with('msg',$msg);
			}else{
				$msg="Thêm nhóm mới không thành công";
				return Redirect::route("guest-list")->with('msg',$msg);
			}

	} // function add group guest
	public function post_edit_Group(){

			$id_user = ChecklistController::id_user();
			$id_group = Input::get('id_group');
		    $rules = array(
				"name"=>"required"
			);
		    // check then insert to database
			if(!Validator::make(Input::all(),$rules)->fails()){
				$group = Groups::find($id_group);
				$group->name = Input::get('name');
				$group->save();
				
				$msg="Đã lưu thay đổi thành công!";
				return Redirect::route("guest-list")->with('msg',$msg);
			}else{
				$msg="Thay đổi không thành công";
				return Redirect::route("guest-list")->with('msg',$msg);
			}

	} // function edit group guest
	public function checkName(){
		$name=Input::get('name');
		$id_group=Input::get('id_group');
		if($name==Groups::where("id",$id_group)->get()){
			return "true";
		}
		else{
			if(Groups::where("name", $name)->count()>0){
			return "false";
			}
			else{return "true";}
		}
	} 
	public function post_delete_Group(){

			$id_user = ChecklistController::id_user();
			$id_group = Input::get('id_group');
			if(Guests::where('group',$id_group)->get()->count('group')>0){
				Guests::where('group',$id_group)->delete();
			}
			Groups::where('id',$id_group)->delete();

		    
				
				$msg="Đã lưu thay đổi thành công!";
				return Redirect::route("guest-list")->with('msg',$msg);
			
				$msg="Thay đổi không thành công";
				return Redirect::route("guest-list")->with('msg',$msg);
			

	} // function edit group guest



}
