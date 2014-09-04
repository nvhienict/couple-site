<?php

class VendorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$results = Vendor::get();
		return View::make('category-vendor')->with('results', $results);
	}

	public static function id_user(){
		$id_user = User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}

	public function category($id){

		$compares = Session::get('compare');

		$results = Vendor::where('category',$id)->get();
		return View::make('category-vendor')->with('results', $results)
											->with('id', $id)
											->with('compares', $compares);
	}
	public function category_vendor(){
		$id = Input::get('id');

		$compares = Session::get('compare');

		$results = Vendor::where('category',$id)->get();
		return View::make('category-vendor')->with('results', $results)
											->with('id', $id)
											->with('compares', $compares);
	}
	public function category_vendor_list(){
		$id = Input::get('id');

		$compares = Session::get('compare');

		$results = Vendor::where('category',$id)->get();
		return View::make('category-vendor-list')->with('results', $results)
											->with('id', $id)
											->with('compares', $compares);
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

		if (!Session::has('email')) {
			$firstname = "";
			$lastname = "";
			$user_name = $firstname.' '.$lastname;
			$user_avatar="";
			$email = "";
			$weddingdate="";
		}else{
			$id_user = VendorController::id_user();

			$firstname = User::where('id',$id_user)->get()->first()->firstname;
			$lastname = User::where('id',$id_user)->get()->first()->lastname;
			$user_name = $firstname.' '.$lastname;
			$user_avatar = User::where('id',$id_user)->get()->first()->avatar;
			$email = User::where('id',$id_user)->get()->first()->email;
			$weddingdate=VendorController::getDates();
		}		
		$photoslides=PhotoSlide::where('vendor',$id)->get();	
		$vendor=Vendor::where('id',$id)->get()->first();

		return View::make("detail-vendor")->with("vendor",$vendor)
										->with('firstname',$firstname)
										->with('lastname',$lastname)
										->with('user_name',$user_name)
										->with('user_avatar',$user_avatar)
										->with('email',$email)
										->with('weddingdate',$weddingdate)
										->with('photoslides',$photoslides);
										
									
	}
	public static function getDates(){
		$id_user = ChecklistController::id_user();
		$weddingdate = User::find($id_user)->weddingdate;

		return Carbon::parse($weddingdate)->format('d-m-Y');
	}

	// comment for vendor
	public function vendor_comment($id_vendor)
	{
		$id_user = Input::get('id_user');
		$cmt = Input::get('cmt');

		$firstname = User::where('id',$id_user)->get()->first()->firstname;
		$lastname = User::where('id',$id_user)->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		// insert comment to table vendor_comment

		$vendor_comment = new VendorComment();
		$vendor_comment->user=$id_user;
		$vendor_comment->user_name=$user_name;
		$vendor_comment->vendor=$id_vendor;
		$vendor_comment->content=$cmt;
		$vendor_comment->save();

		$user_avatar = User::where('id',$id_user)->get()->first()->avatar;

		// get data for show 
		$arComment = vendorComment::get()->last();

		$html = '';
		$html .="<div class='vendor_comment'>
					<div class='vendor_avatar'>
						<img class='user_avatar' alt='' src='data:image/jpeg;base64,". base64_encode($user_avatar) . "' /> 
					</div>
					<div class='vendor_content'>
						<span style='color: #428bca;''>".$arComment->user_name."</span> nói rằng:<br />
						
						".$arComment->content."
					</div>
				</div>
				<div id='your_cmt'></div>";
		echo $html;

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
	//public function destroy($id)
	//{
		//
	//}
	public function search()
	{
		$compares = Session::get('compare');

		$name=Input::get('name');
		$location=Input::get('location');
		$category=Input::get('category_id');
		$vendor= new Vendor();
		
		if(empty($name)&&empty($category))
		{
			$results=$vendor->where('location',"=",$location)->get();
		}
		elseif(empty($name)&&!empty($category))
		{
			$results=$vendor->where('location',$location)->where('category',$category)->get();
		}

		elseif(!empty($name)&&empty($category))
		{
			$results=$vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->get();
		}
		else
		{
			$results=$vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->where('category',$category)->get();
		}

		return View::make('list-vendor')->with("results",$results)
										->with("location",$location)
										->with("compares", $compares);
		
	}
	public function search_list()
	{
		$compares = Session::get('compare');

		$name=Input::get('name');
		$location=Input::get('location');
		$category=Input::get('category_id');
		$vendor= new Vendor();
		
		if(empty($name)&&empty($category))
		{
			$results=$vendor->where('location',"=",$location)->get();
		}
		elseif(empty($name)&&!empty($category))
		{
			$results=$vendor->where('location',$location)->where('category',$category)->get();
		}

		elseif(!empty($name)&&empty($category))
		{
			$results=$vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->get();
		}
		else
		{
			$results=$vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->where('category',$category)->get();
		}

		return View::make('list-vendor-list')->with("results",$results)
										->with("location",$location)
										->with("compares", $compares);
		
	}

	public function post_Compare(){
		
		$gh=Input::get('chk');

		Session::put('compare', $gh);
		$compares = Session::get('compare');

		return View::make('compare')->with('compares', $compares);

	}

	public function post_AddCompare(){

		$compares = Session::get('compare');

		$id = Input::get('id');
		if( in_array($id, $compares) ){
			return Redirect::to('home-page')->with('compares', $compares);
		}
		else{
			$compares = Session::set('compare', $id);
			return Redirect::to('home-page')->with('compares', $compares);
		}

	}
	public function post_RemoveCompare($id){

		$t = Session::get('compare');
		unset($t[$id]);
		$compares = Session::set('compare', $t);
		// return Redirect::to('home-page')->with('compares', $compares);

	}


}
