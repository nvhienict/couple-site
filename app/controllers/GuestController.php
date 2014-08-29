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
	public static function id_user(){
		$id_user = User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}
	public function delete()
		{
			$id=Input::get('id');
			$guest=Guests::find($id);
			$id_group = $guest->group;			
			$guest->delete();
			$total_guest=Guests::where('user',GuestController::id_user())->get()->count();
			$total_invited=Guests::where('user',GuestController::id_user())->where('invited',true)->get()->count();
			$total_noinvited=Guests::where('user',GuestController::id_user())->where('invited',false)->get()->count();
			$total_group_guest=Guests::where('user',GuestController::id_user())->where('group',$id_group)->get()->count();
			echo json_encode(array('id_group'=>$id_group,'total_group_guest'=>$total_group_guest,'total_guest'=>$total_guest,'total_invited'=>$total_invited,'total_noinvited'=>$total_noinvited));
			exit();
		}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create()
	{
		$id_user=GuestController::id_user();
		$id_group=Input::get('id_group');
		
		$count=Guests::where('user',$id_user)->where('group',$id_group)->get()->count();
		if ($count) {
			$guest_last=Guests::where('user',$id_user)->where('group',$id_group)->get()->last()->id;
		} else {
			$guest_last=0;
               
		}
		$guest=new Guests();
		$guest->fullname="New Guest";
		$guest->email="Email";
		$guest->address="Address";
		$guest->phone="Phone";
		$guest->attending="1";
		$guest->group=$id_group;
		$guest->user=$id_user;
        $guest->invited=false;
		$guest->save(); 
		$total_guest=Guests::where('user',GuestController::id_user())->get()->count();
		$total_invited=Guests::where('user',GuestController::id_user())->where('invited',true)->get()->count();
		$total_noinvited=Guests::where('user',GuestController::id_user())->where('invited',false)->get()->count();
		$total_group_guest=Guests::where('user',GuestController::id_user())->where('group',$id_group)->get()->count();	
		$guest_add=Guests::where('user',$id_user)->where('group',$id_group)->get()->last();
		$html = '';
		$html .='<tr class="guest_list'.$guest_add->id.'" id="guest_list_item_cat'.$guest_add->id.'">
			 						
		 		
	 			<td>
	 				<div>
					 <a onclick="name_click('.$guest_add->id.')" class="'.$guest_add->id.'show_name">'.$guest->fullname.'</a> 										 	
					    <input onchange="name_change('.$guest_add->id.')" ondblclick="name_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'name form-control input-edit-guest" name="fullname" value="'.$guest->fullname.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
						 <p style="display:none;color:red;" class="name_error'.$guest_add->id.'">Vui lòng nhập tên khách mời</p>
					 </div>			 
	 			</td>
		 		<td >
	 				<div ><!-- Estimate -->
					 <a onclick="phone_click('.$guest_add->id.')" class="'.$guest_add->id.'show_phone">'.$guest->phone.'</a> 										 	
					    <input onkeyup="key_phone(event,'.$guest_add->id.')" onchange="phone_change('.$guest_add->id.')" ondblclick="phone_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'phone form-control input-edit-guest" name="phone" value="'.$guest->phone.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					 </div>					 
		 		</td>
		 		<td >
					<div  > 
						<a onclick="address_click('.$guest_add->id.')" class="'.$guest_add->id.'show_address">'.$guest->address.'</a> 										 	
					    <input onchange="address_change('.$guest_add->id.')" ondblclick="address_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'address form-control input-edit-guest" name="address" value="'.$guest->address.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					</div>				
				</td>
	 			<td>
	 				<div  > 
						<a onclick="email_click('.$guest_add->id.')" class="'.$guest_add->id.'show_email">'.$guest->email.'</a> 										 	
					    <input onchange="email_change('.$guest_add->id.')" ondblclick="email_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'email form-control input-edit-guest" name="email" value="'.$guest->email.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
					</div>
					<p style="display:none;color:red;" class="email_format'.$guest_add->id.'">email không đúng</p>
 				</td><!-- pay -->
	 			<td>
	 				<div>
		 				<a onclick="attend_click('.$guest_add->id.')" class="'.$guest_add->id.'show_attend">'.$guest->attending.'</a> 										 	
					    <input onchange="attend_change('.$guest_add->id.')" ondblclick="attend_dblclick('.$guest_add->id.')" type="text" class="'.$guest_add->id.'attend form-control input-edit-guest" name="attending" value="'.$guest->attending.'">   
						<input type="hidden" name="'.$guest_add->id.'" value="'.$guest_add->id.'">
	 				</div>
	 			</td><!-- Due -->
	 			<td>
                     
	 				<input onclick="invited1_click('.$guest->id.')" type="submit" name="invited1" id="invited1'.$guest_add->id.'" class="form-control invited1" value="Chưa mời" required="required" title="">
	 				<input type="hidden" name="'.$guest->id.'" value="'.$guest->id.'">
	 				<input onclick="invited2_click('.$guest->id.')"  type="submit" name="invited2" style="display:none" id="invited2'.$guest_add->id.'" class="form-control invited2" value="Đã mời" required="required" title="">
	 				<input type="hidden" name="'.$guest->id.'" value="'.$guest->id.'">
	 			</td>
	 			<td>	 				
	 				<a onclick="guest_del('.$guest_add->id.')" href="javascript:void(0)"  class="confirm guest_list_icon_trash guest_del'.$guest_add->id.'"><i class="glyphicon glyphicon-trash"></i></a>
	 				<input type="hidden"  name="'.$guest_add->id.'" value="'.$guest_add->id.'" >
	 			</td>								
	 		</tr>';
	 		echo json_encode(array('total_group_guest'=>$total_group_guest,'total_guest'=>$total_guest,'total_invited'=>$total_invited,'total_noinvited'=>$total_noinvited,'guest_last'=>$guest_last,'html'=>$html));
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
	public function update_invited1()
	{
		//
		$id=Input::get('id');
	
		$guest=Guests::find($id);
		$guest->invited=true;
		$guest->save();
		$total_invited=Guests::where('user',GuestController::id_user())->where('invited',true)->get()->count();
		$total_noinvited=Guests::where('user',GuestController::id_user())->where('invited',false)->get()->count();
        echo json_encode(array('total_invited'=>$total_invited,'total_noinvited'=>$total_noinvited));
        exit();


	}
	public function update_invited2()
	{
		//
		$id=Input::get('id');
	
		$guest=Guests::find($id);
		$guest->invited=false;
		$guest->save();
		$total_invited=Guests::where('user',GuestController::id_user())->where('invited',true)->get()->count();
		$total_noinvited=Guests::where('user',GuestController::id_user())->where('invited',false)->get()->count();
        echo json_encode(array('total_invited'=>$total_invited,'total_noinvited'=>$total_noinvited));
        exit();
		

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
				if(Input::get('phone')==""){
					$guest->phone ="Phone";
				}
				else{
					$guest->phone = Input::get('phone');
				}
				if(Input::get('address')=="")
				{
					$guest->address="Address";
				}
				else
				{
					$guest->address = Input::get('address');
				}
				$guest->group=Input::get('group');
				if(Input::get('email')=="")
				{
					$guest->email = "Email";
				}
				else
				{
					$guest->email = Input::get('email');
				}
				
				$guest->attending = Input::get('attending');
				$guest->save();
				
				$msg="Đã thêm khách mời thành công!";
				return Redirect::route("guest-list")->with('msg',$msg);
			



	} // function add_Check_List
	public function check_guest_email(){
			$id_user = GuestController::id_user();
			return (Guests::where('id',$id_user)->where("email",Input::get('email'))->count()==0? "true": "false");
		}

	public function exportfile(){
		$id_user =GuestController::id_user();		
		$datas = Guests::where('user', $id_user)->get();
		$email = User::where('id', $id_user)->get()->first()->email;
		$date_wedding = new DateTime(User::find($id_user)->weddingdate);
		
		// -------------
		$row = array(
			array('Khách hàng', $email, ''),
			array('In danh sách khách mời từ', 'thuna.vn', ''),
		    array('Nhóm','Khách mời','Số điện thoại','Email','Địa chỉ','Tham dự','Tình trạng'),
		);

		foreach($datas as $data){
			$id_group=$data->group;
			$group =Groups::where('id',$id_group)->get()->first()->name;
			$guest=$data->fullname;
			$phone=$data->phone;
			$email=$data->email;
			$address=$data->address;
			$attending=$data->attending;
			$invited=$data->invited;
			if($invited==true){
				$print_invited="Đã mời";
			}else{ $print_invited="Chưa mời"; }
		    
		    $row[] = array( $group, $guest,$phone,$email,$address,$attending, $print_invited );
		}


		Excel::create('Guestslist', function($excel) use($row) {
			
		    $excel->sheet('Guestslist', function($sheet) use($row) {
		    	
		    	$sheet->cells('A3:G3', function($row) {
				    // set color for cell
				    $row->setBackground('#95b3d7');

				});

		    	// cell A1 not null
		        $sheet->fromArray($row, null, 'A1', false, false);
		    });
		})->export('xlsx');

		return View::make('guest-list');
	}

}
