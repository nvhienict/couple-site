<?php

class UserContronller extends \BaseController {

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
					Session::put("email",Input::get('txMail'));
					// return Redirect::to("user-checklist");
					return View::make("index");
				}	 
				
				else return View::make("user-login")->with("messages","Tên tài khoản hay mật khẩu không đúng hoặc bạn không phải là user");	

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function get_logout()
	{
		Session::flush();
		return Redirect::route("login");
	}
}
