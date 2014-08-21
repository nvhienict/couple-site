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

	// get id user after user login
	public static function id_user(){
		$id_user = User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}

	// format weddingdate
	public static function getDates(){
		$id_user = ChecklistController::id_user();
		$weddingdate = User::find($id_user)->weddingdate;

		return Carbon::parse($weddingdate)->format('d-m-Y');
	}

	// PROFILE OF USER
	// get profile
	public function get_profile(){

		$user=User::where('id',UserController::id_user())->get();
		return View::make('user.profile')->with('user',$user);
	}
	// check email edit
	public function checkEmail($id){
		$email=Input::get('email');
		if($email==User::where("id",$id)->get()->first()->email){
			return "true";
		}
		else{
			if(User::where("email", "=", $email)->count()>0){
			return "false";
			}
			else{return "true";}
		}
	} 
	// edit profile
	public function post_profile(){

		$firstname = Input::get('firstname');
		$lastname = Input::get('lastname');
		$email = Input::get('email');
		$weddingdate = Input::get('weddingdate');
		$new_password = Hash::make(Input::get('confim_new_password'));

		// update to database
		User::where("id", UserController::id_user())->update(
				array("email"=>$email,
					"weddingdate"=>$weddingdate,
					"firstname"=>$firstname,
					"lastname"=>$lastname,
					"password"=>$new_password));

		$user=User::where('id',UserController::id_user())->get();
		return View::make('user.profile')->with('user',$user);
	}

	

	// get url when user click on menu
	public function post_url(){
		$url = Input::get('aurl');
		Session::set('get_url', $url);
	}

	public function get_login()
	{
		return View::make('user-login');
	}

	// after user login
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
					
					Session::put("email",Input::get('txMail'));

					// return view
					$get_url = Session::get('get_url');
					if( !empty($get_url) ){
						switch ($get_url) {
							case 1:
								// Session::forget('get_url');
								return Redirect::to('user-checklist');
								break;

							case 2:
								// Session::forget('get_url');
								return Redirect::to('budget');
								break;
							
							default:
								return View::make('index');
								break;
						}
					}else{
						return View::make('index');
					}
					
				}else{
					return View::make("user-login")->with("messages","Email hoặc mật khẩu không đúng!");
				}

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function get_logout()
	{
		Session::flush();
		
		$view=View::make('index');
		return Response::make($view);
		
		
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

			$IdUser=User::where('email','=',Input::get('email'))->get()->first()->id;
					//$cookie=Cookie::make('id-user', $IdUser,1);//set cookie		
			Session::put("email",Input::get('email'));
			$view = View::make("index");
			return Response::make($view);
		}else{
			$errors=$validator->messages();
			return Redirect::route("register")->with("errors",$errors);
		}
	}
	public function check_user_email(){
		return (User::where("email",Input::get('email'))->count()==0? "true": "false");
	}
}
