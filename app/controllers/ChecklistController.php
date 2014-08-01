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
		$date=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
		return ChecklistController::sortBy($date->format("m-Y"));
	}
	
	public static function overdue(){
		$date_now=new DateTime("now");
		$overdue=0;
		foreach(User::find(Cookie::get('id-user'))->user_task()->get() as $task)
		{
			$date=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
			$date_task=$date->sub(new DateInterVal('P'.$task->startdate.'D'));
				if(date_timestamp_get($date_now)>date_timestamp_get($date_task)) $overdue++;
		}
		return $overdue; 
	}
	public static function comparedate($month){
		$new_date=date_create_from_format("d-m-Y","31-".$month);
		$date_now=new DateTime("now");
		if(date_timestamp_get($date_now)>date_timestamp_get($new_date)) return true;

	}
	public static function comparedate2($startdate){
		$date_now=new DateTime("now");
		$date=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
		$date_task=$date->sub(new DateInterVal('P'.$startdate.'D'));
		if(date_timestamp_get($date_now)>date_timestamp_get($date_task)) return true;
	}

	public static function byMonth(){
		$date=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
		$month[]=$date->format('m-Y');
		for($i=0;$i<12;$i++){
			//$month[]=$date->sub(new DateInterVal('P'.$task->startdate.'D'));
			$month[]= $date->modify("-1 month")->format('m-Y');
		}
		return $month;
	}
	public static function sortBy($month){
		$tasks_month=array();
		foreach(User::find(Cookie::get('id-user'))->user_task()->get() as $task)
		{
			$date=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
			$date_task=$date->sub(new DateInterVal('P'.$task->startdate.'D'));
			if($date_task->format("m-Y")==$month)
				$tasks_month[]=$task;
		} 
		return View::make('user-checklist')->with('tasks',$tasks_month)
		->with('month',$month);
	}
	public static function changeMonth($key){
		return substr($key,0,2);
	}

	public function search($month)
	{
		$title=Input::get('input-search');
		$user_task=UserTask::where("user",Cookie::get('id-user'))->where('title', 'LIKE', "%$title%")->get();
		return View::make('user-checklist')->with('title',$title)
		->with('tasks',$user_task)
		->with('month',$month);
	}
	public function post_Add_Checklist(){

			$id_user = User::find(Cookie::get('id-user'))->id;

			$songay = $this->count_date();

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
				$msg="Quá trình tạo bị lỗi!";
				return Redirect::route("user-checklist")->with('msg',$msg);
			}

	} // function add_Check_List

	public function post_Edit_Checklist(){

		$id = Input::get('id');
		$title = Input::get('task');
		$category = Input::get('category');
		$description = Input::get('description');
		$date_task= Input::get('startdate');
		$new_date= new DateTime($date_task);

		$date_wedding=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
		if(date_timestamp_get($date_wedding)>date_timestamp_get($new_date))
		{
			$startdate=(date_timestamp_get($date_wedding)-date_timestamp_get($new_date))/(3600*24);
		}
		else
		{
			$startdate=(date_timestamp_get($new_date)-date_timestamp_get($date_wedding))/(3600*24);
		}
		$id_user = User::find(Cookie::get('id-user'))->id;
		    
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
					"startdate"=>$startdate
					));
			
			$msg="Đã sửa công việc thành công!";
			return Redirect::route("user-checklist")->with('msg',$msg);
		}else{
			$msg="Quá trình sửa bị lỗi!";
			return Redirect::route("user-checklist")->with('msg',$msg);
		}
		
	} // function edit_Check_List

	public function post_CheckTaskDel($id){
		UserTask::where('id',$id)->delete();

		return Redirect::route("user-checklist");
	}

	// check in validate
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

	// display task for user
	public function get_Task_Overdue(){
		$checklist = UserTask::where('todo','=',0)->paginate(10);

		return View::make('user-checklist')->with('checklist', $checklist);
	}
	public function get_Task_Complete(){
		$checklist = UserTask::where('todo','=',1)->paginate(10);

		return View::make('user-checklist')->with('checklist', $checklist);
	}

	public function post_CheckTaskComplete($ac){
		$id = Input::get('id');
		if($ac==1){
			$user_task = UserTask::where('id',$id)->update(
			array(
				"todo"=>1
				));
		}else{
			$user_task = UserTask::where('id',$id)->update(
			array(
				"todo"=>0
				));
		}
		
	}

	public function exportfile(){

		$table = UserTask::all();

		$output='';
 
	    foreach ($table as $row) {
	        $output .=  implode(",",$row->toArray());
	    }
	    $headers = array(
	        'Content-Type' => 'text/csv',
        	'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
	    );
	 
	    return Response::make(rtrim($output, "\n"), 200, $headers);

	}
}
