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
		$id_user 		= User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}

	// count data to check user isset in database
	public static function isset_user(){
		$isset_user 	= User::where( 'email', Session::get('email') )->count();
		return $isset_user;
	}


	// format weddingdate
	public static function getDates(){
		$id_user 		= ChecklistController::id_user();
		$weddingdate 	= User::find($id_user)->weddingdate;

		return Carbon::parse($weddingdate)->format('d-m-Y');
	}

	// PROFILE OF USER
	// get profile
	public function get_profile(){

		$user 			= User::where( 'id', $this->id_user() )->get();
		return View::make('user.profile')->with('user',$user);
	}
	// check email edit
	public function checkEmail($id){
		$email 			= Input::get('email');
		if( $email==User::where("id",$id)->get()->first()->email ){
			return "true";
		}
		else{
			if(User::where("email", "=", $email)->count()>0){
			return "false";
			}
			else{return "true";}
		}
	} 

	// check password edit
	public function checkPass($id){
		$password 		= Input::get('password');
		$pass 			= User::where("id",$id)->get()->first()->password;

		if(Hash::check($password, $pass)){
			return "true";
		}
		else{
			return "false";
		}
	}

	// edit profile
	public function post_profile(){

		$firstname 			= Input::get('firstname');
		$lastname 			= Input::get('lastname');
		$email 				= Input::get('email');
		$weddingdate 		= Input::get('weddingdate');
		$cover_weddingdate  = Carbon::parse($weddingdate)->format('Y-m-d');

		// update to database
		User::where( "id", $this->id_user() )->update(
				array(
						"email"		=> $email,
						"weddingdate"	=> $cover_weddingdate,
						"firstname"		=> $firstname,
						"lastname"		=> $lastname
					));
		$msg 				= "Cập nhật thông tin thành công";

		$user 				= User::where( 'id', $this->id_user() )->get();
		return View::make('user.profile')->with('user',$user)->with('msg',$msg);
	}

	// update padword
	public function profile_password(){

		$password_new 		= Hash::make(Input::get('confim_new_password'));

		// update to database
		User::where("id", UserController::id_user() )->update(
				array("password"=>$password_new));
		$msg 				= "Cập nhật mật khẩu thành công";

		$user 				= User::where( 'id',$this->id_user() )->get();
		return View::make('user.profile')->with('user',$user)->with('msg',$msg);
	}

	// update avatar
	public function update_avatar()
	{

		//
		$file 				= Input::file('image');
		$input 				= array('image' => $file);
		$rules 				= array(
								'image' => 'image'
							);
		$validator 			= Validator::make($input, $rules);
		if ( $validator->fails() )
		{
			return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

		}
		else 
		{

        	File::makeDirectory(public_path('images/user/avatar'),$mode = 0775,true,true);
			$filename 		= $id_user.'_' .str_random(10).'.' .$file->getClientOriginalExtension();
			$pathsave 		= 'images/user/avatar/'.$filename;
			$path 			= public_path('images/user/avatar/'.$filename);
			Image::make($image->getRealPath())->resize(200, 200)->save($path);

			// update to database
			User::where( "id", $this->id_user() )->update(
					array("avatar"=>$pathsave));

			return Response::json(
				['success' => true,
				'file' => asset($pathsave)]
			);

		}
	} // end update_avatar


	// return view for user login
	public function get_login()
	{
		if(!Session::has('email')){
			Session::flush();
			return View::make('user-login');
		}else{
			return Redirect::to('/');
		}
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
					Session::put("email",Input::get('txMail'));

					// go to view request
					return Redirect::to(URL::previous());

				}else{
					return View::make("user-login")->with("messages","Email hoặc mật khẩu không đúng!");
				}

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function get_logout()
	{
		Session::forget('email');
		
		$view = View::make('index');
		return Response::make($view);
	
	}

	// if user deleted in database destroy session and redirect to view index
	public static function get_logout_2()
	{
		Session::forget('email');
		
		$view=View::make('index');
		return Response::make($view);

	}

	public function get_register()
	{
		// get url then create Session
		$url = URL::previous();

		$arStr = explode("/", $url);
		$count = count($arStr);
		$url = $arStr[$count-1];

		Session::put('url',$url);

		return View::make('register');
	}

	// user post register
	public function post_users(){
		$rules=array(
			"first_name"=>"required|min:2",
			"last_name"=>"required|min:1",
			"weddingdate"=>"required",
			"email"=>"required|email",
			"password"=>"required|min:3",
			"password_confirm"=>"required|min:3"
			);
		$validator=Validator::make(Input::all(),$rules);
		if($validator->passes())
		{

			// get avatar default
			$avatar_default = User::where('role_id', '=', 1)->get()->first()->avatar;

			$weddingdate = Input::get('weddingdate');

			$user = new User();
			$user->firstname=Input::get('first_name');
			$user->lastname=Input::get('last_name');
			$user->email=Input::get('email');
			$user->avatar = $avatar_default;
			$user->password=Hash::make(Input::get('password_confirm'));
			$user->weddingdate = $weddingdate;
			$user->role_id=Input::get('role');
			$user->budget=0;
			$user->save();

			//kiểm tra nếu startdate so với hiện tại đã qua, thì lưu startdate của user bằng startdate hiện tại
			$dateNow = New DateTime('now');
			$date_wedding = new DateTime($weddingdate);

			if(date_timestamp_get($dateNow) > date_timestamp_get($date_wedding))
			{
				$NowToWedding = (date_timestamp_get($dateNow)- date_timestamp_get($date_wedding))/(3600*24);
			}
			else
			{
				$NowToWedding = (date_timestamp_get($date_wedding)- date_timestamp_get($dateNow))/(3600*24);
			}
				
				//truyền dữ liệu sang bảng usertask
				$id_user = User::where('email','=',Input::get('email'))->get()->first()->id; 
					
					$tasks = Task::get();
					foreach($tasks as $task){
						if( $NowToWedding > $task->startdate){
							$startdate = $task->startdate;
						}
						else
						{
							$startdate = $NowToWedding+1;
						}
						

						$usertask = new UserTask();
						$usertask->title = $task->title;
						$usertask->user = $id_user;
						$usertask->startdate = $startdate;
						$usertask->category = $task->category;
						$usertask->description = $task->description;
						$usertask->todo = 0;
						$usertask->save();

					}

			$IdUser=User::where('email','=',Input::get('email'))->get()->first()->id;

			Session::put("email",Input::get('email'));

			// go to view request
			if ( Session::get('url')==NULL ) {
				return Redirect::route('index');
			} else {
				$url = Session::get('url');
				return Redirect::route($url);
			}
			
			
		}else{
			$errors=$validator->messages();
			return Redirect::route("register")->with("errors",$errors);
		}
	}

	public function check_user_email(){
		return (User::where("email",Input::get('email'))->count()==0? "true": "false");
	}

	public function loginFacebook($action = "")
	{

		// $email = Input::get('email');
		// $firstname = Input::get('firstname');
		// $lastname = Input::get('lastname');

		// return $email.'***'.$firstname.'***'.$lastname;

		// get data from input
	    $code 				= Input::get( 'code' );

	    // get fb service
	    $fb 				= OAuth::consumer( 'Facebook' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from facebook, get the token
	        $token 			= $fb->requestAccessToken( $code );

	        // Send a request with it
	        $result 		= json_decode( $fb->request( '/me' ), true );
	        // $result['id'];



	        $email 			= $result['email'];
	        $firstname 		= $result['first_name'];
	        $lastname 		= $result['last_name'];
	        $result['name'];

	        if( User::where("email", $email)->count()==0 )
	        {
	        	// get avatar default
				$avatar_default 	= User::where('role_id', '=', 1)->get()->first()->avatar;

				$date_wedding_fb 	= New DateTime('now');
				$date_wedding_fb_cv = $date_wedding_fb->format('Y-m-d');

				$user = new User();
				$user->firstname = $firstname;
				$user->lastname = $lastname;
				$user->email = $email;
				$user->avatar = $avatar_default;
				$user->weddingdate = $date_wedding_fb_cv;
				$user->role_id = 2;
				$user->budget = 0;
				$user->save();

		        
				//kiểm tra nếu startdate so với hiện tại đã qua, thì lưu startdate của user bằng startdate hiện tại
				$dateNow 			= New DateTime('now');
				$date_wedding 		= new DateTime($date_wedding_fb_cv);

				if(date_timestamp_get($dateNow) > date_timestamp_get($date_wedding))
				{
					$NowToWedding 	= (date_timestamp_get($dateNow)- date_timestamp_get($date_wedding))/(3600*24);
				}
				else
				{
					$NowToWedding 	= (date_timestamp_get($date_wedding)- date_timestamp_get($dateNow))/(3600*24);
				}
					
					//truyền dữ liệu sang bảng usertask
					$id_user 		= User::where('email','=',$email)->get()->first()->id; 
						
						$tasks 		= Task::get();
						foreach($tasks as $task){
							if( $NowToWedding > $task->startdate){
								$startdate = $task->startdate;
							}
							else
							{
								$startdate = $NowToWedding+1;
							}
							

							$usertask = new UserTask();
							$usertask->title 	   = $task->title;
							$usertask->user 	   = $id_user;
							$usertask->startdate   = $startdate;
							$usertask->category    = $task->category;
							$usertask->description = $task->description;
							$usertask->todo 	   = 0;
							$usertask->save();

						}

				$IdUser = User::where('email','=',$email)->get()->first()->id;

				Session::put("email", $email);

				// get url then create Session
				$url 	= URL::previous();

				$arStr  = explode("/", $url);
				$count  = count($arStr);
				$url 	= $arStr[$count-1];
				Session::put('url',$url);

				return View::make('after-login-fb');

				// go to view request
				// return Redirect::to(URL::previous());
				
	        } else {
	        	$IdUser = User::where('email','=',$email)->get()->first()->id;

				Session::put("email", $email);

				// go to view request
				return Redirect::to(URL::previous());
	        }

	        


	        //Var_dump
	        //display whole array().
	        // dd($result);

	    }
	    // if not ask for permission first
	    else {
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
	        return Redirect::to( (string)$url );
	    }
	} // end function loginFacebook

	public function loginFacebookUpdate(){
		$weddingdateInput 	= Input::get("weddingdate");
		$cover_weddingdate 	= Carbon::parse($weddingdateInput)->format('Y-m-d');

		// update to database
		User::where("id", UserController::id_user())->update(
			array("weddingdate"=>$cover_weddingdate)
			);

		// go to view request
		if ( (Session::get('url')==NULL)||(Session::get('url')=='public') ) {
			return Redirect::route('index');
		} else {
			$url = Session::get('url');
			return Redirect::route($url);
		}

	} // end loginFacebookUpdate

}
