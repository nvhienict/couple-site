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

	public static function id_user(){
		$id_user = User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}

	// format date ('d-m-Y')
	public static function getDates(){
		$id_user = ChecklistController::id_user();
		$weddingdate = User::find($id_user)->weddingdate;

		return Carbon::parse($weddingdate)->format('d-m-Y');
	}

	// count viec can lam
	public static function countTasksToDo(){
		$id_user = ChecklistController::id_user();
		$tasks = UserTask::where('user',$id_user)->count();

		return $tasks;
	}
	// count viec hoan thanh
	public static function countTasksComplete(){
		$id_user = ChecklistController::id_user();
		$tasks = UserTask::where('user',$id_user)->where('todo',1)->count();

		return $tasks;
	}


	public function get_UserChecklist()
	{
		
		return View::make('user-checklist');
	}

	public function get_UserChecklist_category()
	{
		
		return View::make('user-checklist-category');
	}
	
	public static function overdue(){
		$id_user = ChecklistController::id_user();

		$date_now=new DateTime("now");
		$overdue=0;

		foreach(User::find($id_user)->user_task()->get() as $task)
		{
			$date=new DateTime(User::find($id_user)->weddingdate);
			$date_task=$date->sub(new DateInterVal('P'.$task->startdate.'D'));
				if(date_timestamp_get($date_now)>date_timestamp_get($date_task) && $task->todo!=1) $overdue++;
		}
		return $overdue; 
	}
	public static function comparedate($startdate,$todo){
		$id_user = ChecklistController::id_user();

		$date_now=new DateTime("now");
		$date=new DateTime(User::find($id_user)->weddingdate);
		$date_task=$date->sub(new DateInterVal('P'.$startdate.'D'));
		if(date_timestamp_get($date_now)>date_timestamp_get($date_task) && $todo!=1) return true;
	}

	public static function byMonth(){
		$id_user = ChecklistController::id_user();

		$date=new DateTime(User::find($id_user)->weddingdate);
		$month=array($date->format('m-Y'));
		for($i=0;$i<12;$i++){
			//$month[]=$date->sub(new DateInterVal('P'.$task->startdate.'D'));
			// $month[]= $date->modify("-1 month")->format('m-Y');
			array_unshift($month,$date->modify("-1 month")->format('m-Y'));
		}
		return $month;
	}
	public static function sortBy($month){
		$id_user = ChecklistController::id_user();

		$tasks_month=array();
		foreach(User::find($id_user)->user_task()->get() as $task)
		{
			$date=new DateTime(User::find($id_user)->weddingdate);
			$date_task=$date->sub(new DateInterVal('P'.$task->startdate.'D'));
			if($date_task->format("m-Y")==$month)
				$tasks_month[]=$task;
		} 
		return $tasks_month;
	}
	public function getId()
	{
		$id_user = ChecklistController::id_user();

		$usertask= UserTask::find(Input::get('id'));
		$date=new DateTime(User::find($id_user)->weddingdate);
		$date_task=$date->sub(new DateInterVal('P'.$usertask->startdate.'D'));
		$task=array(
		"id"=>$usertask->id,
		"title"=>$usertask->title,
		"startdate"=>$date_task->format("d-m-Y"),
		"description"=>$usertask->description,
		"category_id"=>$usertask->category
		);
		return $task;
	}
	public function deleteId()
	{
		$usertask= UserTask::find(Input::get('id'))->delete();
	}
	public static function changeMonth($key){
		$id_user = ChecklistController::id_user();
		
		$date_now=new DateTime("now");
		$date_wedding=new DateTime(User::find($id_user)->weddingdate);
		
		if($date_now->format("m-Y")==$key) return $key."<span class='status-month'>Tháng hiện tại</span>";
		else if($date_wedding->format("m-Y")==$key) return $key."<span class='status-month'>Tháng vu quy</span>";
		return $key; 
	}

	public function search($month)
	{
		$id_user = ChecklistController::id_user();

		$title=Input::get('input-search');
		$user_task=UserTask::where("user", $id_user)->where('title', 'LIKE', "%$title%")->get();
		return View::make('user-checklist')->with('title',$title)
		->with('tasks',$user_task)
		->with('month',$month);
	}
	public function post_Add_Checklist(){

			$id_user = ChecklistController::id_user();

			$new_date= new DateTime(Input::get('startdate'));

			$date_wedding=new DateTime(User::find($id_user)->weddingdate);
			if(date_timestamp_get($date_wedding)>date_timestamp_get($new_date))
			{
				$startdate=(date_timestamp_get($date_wedding)-date_timestamp_get($new_date))/(3600*24);
			}
			else
			{
			$startdate=(date_timestamp_get($new_date)-date_timestamp_get($date_wedding))/(3600*24);
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
				$user_task->startdate = $startdate;
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
		$id_user = ChecklistController::id_user();

		$id = Input::get('id');
		$title = Input::get('task');
		$category = Input::get('category');
		$description = Input::get('description');
		$new_date= new DateTime(Input::get('startdate'));
		$date_wedding=new DateTime(User::find($id_user)->weddingdate);
		if(date_timestamp_get($date_wedding)>date_timestamp_get($new_date))
		{
			$startdate=(date_timestamp_get($date_wedding)-date_timestamp_get($new_date))/(3600*24);
		}
		else
		{
			$startdate=(date_timestamp_get($new_date)-date_timestamp_get($date_wedding))/(3600*24);
		}
		
		    
	    $rules=array(
			"task"=>"required",
			"startdate"=>"required",
			"category"=>"required"
		);
	    // check then insert to database
		if(!Validator::make(Input::all(), $rules)->fails()){
			$user_task = UserTask::find($id);
			$user_task->title=$title;
			$user_task->category=$category;
			$user_task->description=$description;
			$user_task->startdate=$startdate;
			$user_task->save();
			
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
		$id_user = ChecklistController::id_user();

		$datas = UserTask::where('user', $id_user)->get();
		$email = User::where('id', $id_user)->get()->first()->email;

		$date_wedding = new DateTime(User::find($id_user)->weddingdate);
		
		// -------------
		$row = array(
			array('Khách hàng', $email, ''),
			array('In công việc từ', 'thuna.vn', ''),
		    array('Danh mục','Ngày làm','Tình trạng','Tên công việc'),
		);

		foreach($datas as $data){
			
			$category = UserTask::find($data->id)->category()->get()->first()->name;
			
			$date_wedding = new DateTime(User::find($id_user)->weddingdate);
			$startdate = $data->startdate;
			$date_task = $date_wedding->sub(new DateInterVal('P'.$startdate.'D'));

			$todo = $data->todo;
			if($todo==0){
				$print_todo="Chưa làm";
			}else{ $print_todo="Đã hoàn thành"; }
		    
		    $row[] = array( $category, $date_task->format('d-m-Y'), $print_todo, $data->title );
		}


		Excel::create('Checklist', function($excel) use($row) {
			
		    $excel->sheet('Checklist', function($sheet) use($row) {
		    	
		    	$sheet->cells('A3:D3', function($row) {
				    // set color for cell
				    $row->setBackground('#95b3d7');

				});

		    	// cell A1 not null
		        $sheet->fromArray($row, null, 'A1', false, false);
		    });
		})->export('xlsx');

		return View::make('user-checklist');
	}
}
