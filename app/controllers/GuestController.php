<?php

class GuestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('guest.guest');
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
	public function post_Add_Group(){

			$id_user = GuestController::id_user();

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
	}		
	public function post_Add_Guest(){

			$id_user = GuestController::id_user();

		   
		    // check then insert to database
			
				$guest = new Guests();
				$guest->user=$id_user;
				$guest->fullname = Input::get('fullname');
				$guest->phone = Input::get('phone');
				$guest->address = Input::get('address');
				$guest->group=Input::get('group');
				$guest->email = Input::get('email');
				$guest->attending = Input::get('attending');
				$guest->save();
				
				$msg="Đã thêm khách mời thành công!";
				return Redirect::route("guest-list")->with('msg',$msg);
			


	} // function add_Check_List
	public function check_guest_email(){
			$id_user = GuestController::id_user();
			return (Guests::where('id',$id_user)->where("email",Input::get('email'))->count()==0? "true": "false");
		}

}
