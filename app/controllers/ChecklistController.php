<?php

class ChecklistController extends \BaseController {

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

	public function get_UserChecklist()
	{
		$email = Session::get('email');
		$id_user = User::where('email','LIKE',$email)->get()->first()->id;

		$checklist = UserTask::where('user',$id_user)->get();

		return View::make('user-checklist')->with('checklist', $checklist);
	}

	public function post_Add_Checklist(){

		$email = Session::get('email');
		$weddingdate = User::where('email','LIKE',$email)->get()->first()->weddingdate;
		$id_user = User::where('email','LIKE',$email)->get()->first()->id;

		$startdate = Input::get('startdate'); // get date user enter

		$date1 = $startdate;
		$date2 = $weddingdate;

		// count number date
		if ($date1<$date2){ 
		    $dates_range[]=$date1; 
		    $date1=strtotime($date1); 
		    $date2=strtotime($date2); 
		    $songay=0; 
		    while ($date1!=$date2){ 
		      $date1=mktime(0, 0, 0, date("m", $date1), date("d", $date1)+1, date("Y", $date1)); 
		      $dates_range[]=date('Y-m-d', $date1); 
		      $songay++; 
		    } 

		    $rules=array(
				"task"=>"required",
				"startdate"=>"required",
				"category"=>"required"
			);
		    // check then insert to database
			if(!Validator::make(Input::all(),$rules)->fails()){
				$user_task = new UserTask();
				$user_task->title = Input::get('task');
				$user_task->user = $id_user;
				$user_task->startdate = $songay;
				$user_task->category = Input::get('category');
				$user_task->description = Input::get('description');
				$user_task->save();
				
				$msg="Đã tạo công việc thành công!";
				return Redirect::route("user-checklist")->with('msg',$msg);
			}else{
				// $msg="Quá trình tạo bị lỗi!";
				// return Redirect::route("checklist")->with('msg',$msg);
				return 'Lỗi';
			}

		} else{
			return "Ngày cưới của bạn qua rồi!";
		}
	} // function add_Check_List

	public function post_Edit_Checklist(){

		$id = Input::get('id');
		$title = Input::get('task');
		$category = Input::get('category');
		$description = Input::get('description');

		$email = Session::get('email');
		$weddingdate = User::where('email','LIKE',$email)->get()->first()->weddingdate;
		$id_user = User::where('email','LIKE',$email)->get()->first()->id;

		$startdate = Input::get('startdate_edit'); // get date user enter

		$date1 = $startdate;
		$date2 = $weddingdate;

		// count number date
		if ($date1<$date2){ 
		    $dates_range[]=$date1; 
		    $date1=strtotime($date1); 
		    $date2=strtotime($date2); 
		    $songay=0; 
		    while ($date1!=$date2){ 
		      $date1=mktime(0, 0, 0, date("m", $date1), date("d", $date1)+1, date("Y", $date1)); 
		      $dates_range[]=date('Y-m-d', $date1); 
		      $songay++; 
		    }
		    
		    $rules=array(
				"task"=>"required",
				"startdate"=>"required",
				"category"=>"required"
			);
		    // check then insert to database
			if(!Validator::make(Input::all(), $rules)->fails()){
				$user_task = UserTask::where('id',$id)->update(
					array("title"=>$title,
						"category"=>$category,
						"description"=>$description,
						"startdate"=>$songay
						));
				
				$msg="Đã sửa công việc thành công!";
				return Redirect::route("user-checklist")->with('msg',$msg);
			}else{
				// $msg="Quá trình tạo bị lỗi!";
				// return Redirect::route("checklist")->with('msg',$msg);
				return 'Lỗi';
			}

		} else{return "Ngày cưới của bạn qua rồi!";}
		
	} // function edit_Check_List

	public function post_CheckTaskDel($id){
		UserTask::where('id',$id)->delete();

		return Redirect::route("user-checklist");
	}

	public function post_CheckTaskAdd($value='')
	{
		$task=Input::get('task');

		if(UserTask::where("title", "=", $task)->count()>0){
			return "false";
		}
		else{return "true";}
	}
	public function post_CheckTaskEdit($id){
		$title=Input::get('task');
		if($title==UserTask::where("id",$id)->get()->first()->title){
			return "true";
		}
		else{
			if(UserTask::where("title", "=", $title)->count()>0){
			return "false";
			}
			else{return "true";}
		} 
	}

}
