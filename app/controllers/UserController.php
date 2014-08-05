<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('index');
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
	public function get_login()
	{
		return View::make('user-login');
	}
	public function post_login()
	{
		try {
			
			($remember=Input::has('remember')) ? true: false;
			$auth=Auth::attempt(array(
					"email"=> Input::get('txMail'),
					"password"=> Input::get('txPass'),
					"role_id"=> 2
					),$remember);
				
				if($auth)
				{
					$IdUser=User::where('email','=',Input::get('txMail'))->get()->first()->id;
					$cookie=Cookie::make('id-user', $IdUser, 120);//set cookie
					Session::put("email",Input::get('txMail'));
					// return Redirect::to("user-checklist");
					
					$view = View::make('index');

					return Response::make($view)->withCookie($cookie);
				}	 
				else return View::make("user-login")->with("messages","Email hoặc mật khẩu không đúng!");	

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function get_logout()
	{
		Session::flush();
		$DelCookie=Cookie::forget('id-user');
		$view=View::make('index');
		return Response::make($view)->withCookie($DelCookie);
		
		
	}

	public function get_register()
	{
		return View::make('register');
	}
	public function post_users(){
		$rules=array(
			"first_name"=>"required|min:3",
			"last_name"=>"required|min:1",
			"weddingdate"=>"required",
			"email"=>"required|email",
			"password"=>"required|min:3",
			"password_confirm"=>"required|min:3"
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->passes())
		{
			$user=new User();
			$user->firstname=Input::get('first_name');
			$user->lastname=Input::get('last_name');
			$user->email=Input::get('email');
			$user->password=Hash::make(Input::get('password_confirm'));
			$user->weddingdate=Input::get('weddingdate');
			$user->role_id=Input::get('role');
			$user->budget=0;
			$user->save();

			

				//truyền dữ liệu sang bảng usertask
					
					$id_user = User::where('email','=',Input::get('email'))->get()->first()->id; //lấy id_user từ cookie chi đó hi

					$tasks = Task::get();
					foreach($tasks as $task){
						$usertask = new UserTask();
						$usertask->title = $task->title;
						$usertask->user = $id_user;
						$usertask->startdate = $task->startdate;
						$usertask->category = $task->category;
						$usertask->description = $task->description;
						$usertask->todo = 0;
						$usertask->save();

					}

				// truyền dữ liệu sang bảng userbudget
					$id_user = User::where('email','=',Input::get('email'))->get()->first()->id; //lấy id_user từ cookie chi đó hi

					$budgets = Budget::get();
					foreach($budgets as $budget){

						$userbudget = new UserBudget();
						$userbudget->user = $id_user;
						$userbudget->category = $budget->category;
						$userbudget->item = $budget->item;
						$userbudget->save();

					}

			$IdUser=User::where('email','=',Input::get('email'))->get()->first()->id;
					$cookie=Cookie::make('id-user', $IdUser, 120);//set cookie		
			Session::put("email",Input::get('email'));
			$view = View::make("index");
			return Response::make($view)->withCookie($cookie);
		}else{
			$errors=$validator->messages();
			return Redirect::route("register")->with("errors",$errors);
		}
	}
	public function check_user_email(){
		return (User::where("email",Input::get('email'))->count()==0? "true": "false");
	}
}
