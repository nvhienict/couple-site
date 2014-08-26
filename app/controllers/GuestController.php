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
	public function delete()
		{
			$id=Input::get('id');
			$guest=Guests::find($id);
			$guest->delete();
		}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$id_user=UserController::id_user();
		$id_group=Input::get('id_group');
		
		$count=Guests::where('group',$id_group)->get()->count();
		if ($count) {
			$guest_last=Guests::where('group',$id_group)->get()->last()->id;
		} else {
			$guest_last=0;
               
		}
		$guest=new Guests();
		$guest->fullname="New Guest";
		$guest->email="Email";
		$guest->address="Address";
		$guest->phone="Number";
		$guest->attending="0";
		$guest->group=$id_group;
		$guest->user=$id_user;
		$guest->save(); 
		$guest_add=Guests::get()->last();
		$html = '';
		$html .='<tr class="guest_list'.$guest_add->id.'" id="guest_list_item_cat'.$guest_add->id.'">
			 						
		 		<td>
		 				<div class="checkbox">
		 					<label>
		 						<input type="checkbox" value="">
		 						
		 					</label>
		 				</div>
	 				</td>
	 			<td>
	 				<div>
					 <a onclick="name_click('.$guest_add->id.')" class="'.$guest_add->id.'show_name">'.$guest->fullname.'</a> 										 	
					    <input onchange="name_change('.$guest_add->id.')" ondblclick="name_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'name form-control input-edit-guest" name="fullname" value="'.$guest->fullname.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					 </div>	
					 <p style="display:none;color:red;" class="name_error'.$guest_add->id.'">Vui lòng nhập tên khách mời</p>		 
	 			</td>
		 		<td >
	 				<div ><!-- Estimate -->
					 <a onclick="phone_click('.$guest_add->id.')" class="'.$guest_add->id.'show_phone">'.$guest->phone.'</a> 										 	
					    <input onchange="phone_change('.$guest_add->id.')" ondblclick="phone_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'phone form-control input-edit-guest" name="phone" value="'.$guest->phone.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					 </div>
					  <p style="display:none;color:red;" class="phone_error'.$guest_add->id.'">Vui lòng nhập sdt</p>
					 
		 		</td>
		 		<td >
					<div  > 
						<a onclick="address_click('.$guest_add->id.')" class="'.$guest_add->id.'show_address">'.$guest->address.'</a> 										 	
					    <input onchange="address_change('.$guest_add->id.')" ondblclick="address_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'address form-control input-edit-guest" name="address" value="'.$guest->address.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					</div>
					
                     <p style="display:none;color:red;" class="address_error'.$guest_add->id.'">Vui lòng nhập địa chỉ</p>
				</td>
	 			<td >
	 				<div  > 
						<a onclick="email_click('.$guest_add->id.')" class="'.$guest_add->id.'show_email">'.$guest->email.'</a> 										 	
					    <input onchange="email_change('.$guest_add->id.')" ondblclick="email_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'email form-control input-edit-guest" name="email" value="'.$guest->email.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					</div>
					<p style="display:none;color:red;" class="email_error'.$guest_add->id.'">Vui lòng nhập email</p>
 				</td><!-- pay -->
	 			<td>
	 				<div>
		 				<a onclick="attend_click('.$guest_add->id.')" class="'.$guest_add->id.'show_attend">'.$guest->attending.'</a> 										 	
					    <input onchange="attend_change('.$guest_add->id.')" ondblclick="attend_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'attend form-control input-edit-guest" name="attending" value="'.$guest->attending.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
	 				</div>
	 				<p style="display:none;color:red;" class="attend_error'.$guest_add->id.'">Vui lòng nhập số khách mời</p>
	 			</td><!-- Due -->
	 			<td>
	 				<a onclick="guest_del('.$guest_add->id.')" href="javascript:void(0)"  class="confirm guest_list_icon_trash guest_del'.$guest_add->id.'"><i class="glyphicon glyphicon-trash"></i></a>
	 				<input type="hidden"  name="'.$guest_add->id.'" value="'.$guest_add->id.'" >
	 			</td>								
	 		</tr>';
	 		echo json_encode(array('guest_last'=>$guest_last,'html'=>$html));
	 		exit();
	}
public function update_name()
	{
		//
		$id=Input::get('id');
	    $name=Input::get('name');
		$guest=Guests::find($id);
		$guest->fullname=$name;
		$guest->save();

	}
	public function update_phone()
	{
		//
		$id=Input::get('id');
	    $phone=Input::get('phone');
		$guest=Guests::find($id);
		$guest->phone=$phone;
		$guest->save();

	}
	public function update_address()
	{
		//
		$id=Input::get('id');
	    $address=Input::get('address');
		$guest=Guests::find($id);
		$guest->address=$address;
		$guest->save();

	}
	public function update_email()
	{
		//
		$id=Input::get('id');
	    $email=Input::get('email');
		$guest=Guests::find($id);
		$guest->email=$email;
		$guest->save();

	}
	public function update_attend()
	{
		//
		$id=Input::get('id');
	    $attend=Input::get('attend');
		$guest=Guests::find($id);
		$guest->attending=$attend;
		$guest->save();

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
