<?php

class WebsiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return View::make('website_user.index');
	}


	// get id user after user login
	public static function id_user(){
		$id_user = User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make("website_user.page_temp");
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
	public function edit()
	{
		//
		return View::make("website_user.edit_page_temp");
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

	public function design()
	{
		// get username
		if(!Session::has('email')){
			$firstname = "";
			$lastname = "";
			$user_name = $firstname.' '.$lastname;
		}else{
			$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
			$lastname = User::where('id', WebsiteController::id_user())->get()->first()->lastname;
			$user_name = $firstname.' '.$lastname;
		}

		return View::make('website_user.page_design')->with('firstname', $firstname);
	}


}
