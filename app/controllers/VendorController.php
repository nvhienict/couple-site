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

	// get id user from Session email
	public static function id_user(){
		$id_user = User::where( 'email', Session::get('email') )->get()->first()->id;
		return $id_user;
	}

	// get location last
	public static function location_last()
	{
		// return Location::get()->last();
		return Location::get()->first();
	}

	public function ratingVendor()
	{
		$id_user 				= VendorController::id_user();
		$id_vendor 				= Input::get('vendor');
		$check 					= Rating::where('user',$id_user)->where('vendor',$id_vendor)->get()->count();
		if($check)
		{
			$rating_up 			= Rating::where('user',$id_user)->where('vendor',$id_vendor)->get()->first();
			$rating_up->rating  = Input::get('rating');
			$rating_up->save();
			$avg_rating 		= round(Rating::where('vendor',$id_vendor)->avg('rating'),1);
		}
		else
		{
			$rating_add 		= new Rating();
			$rating_add->user 	= $id_user;
			$rating_add->rating = Input::get('rating');
			$rating_add->vendor = Input::get('vendor');
			$rating_add->save();
			$avg_rating 		= round(Rating::where('vendor',$id_vendor)->avg('rating'),1);
		}
		echo json_encode(array('avg_rating'=>$avg_rating));
		exit();
	}
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */



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
	public static function getIdVendor($vendor_slug){

		return	Vendor::where('slug',$vendor_slug)->get()->first()->id;
	}

	public function show($slug_cate,$slug_vendor)
	{  
		$id 				= VendorController::getIdVendor($slug_vendor);
		// $id=VendorController::getIdVendor($slug_vendor);
		if (!Session::has('email')) {
			$firstname 		= "";
			$lastname 		= "";
			$user_name 		= $firstname.' '.$lastname;
			$user_avatar 	= "";
			$email 			= "";
			$weddingdate 	= "";
		}else{
			$id_user 		= VendorController::id_user();

			$firstname 		= User::where('id',$id_user)->get()->first()->firstname;
			$lastname 		= User::where('id',$id_user)->get()->first()->lastname;
			$user_name 		= $firstname.' '.$lastname;
			$user_avatar 	= User::where('id',$id_user)->get()->first()->avatar;
			$email 			= User::where('id',$id_user)->get()->first()->email;
			$weddingdate 	= VendorController::getDates();
		}
		if(Session::has('email'))
		{
			$check_rating 	= Rating::where('user',$id_user)->where('vendor',$id)->get()->count();
			if($check_rating>0){
				$ratings 	= Rating::where('user',$id_user)->where('vendor',$id)->get()->first()->rating;
			}
			else
			{
				$ratings = 0;
			}
		}	
		else
		{
			$ratings = 0;
		}
		
		$check_photoslide 	= PhotoSlide::where('vendor',$id)->count();
		$photoslides 		= PhotoSlide::where('vendor',$id)->get();	
		$vendor 			= Vendor::where('id',$id)->get()->first();
		
		$rating_avg 		= Rating::where('vendor',$id)->get()->count();
		if($rating_avg>0)
		{
			$check_rating_avg = true;
			$avg_rating 	  = round(Rating::where('vendor',$vendor->id)->avg('rating'),1);
		}
		else
		{
			$check_rating_avg = false;
			$avg_rating 	  = 0;
		}
		
		return View::make("detail-vendor")->with("vendor",$vendor)
										->with('firstname',$firstname)
										->with('lastname',$lastname)
										->with('user_name',$user_name)
										->with('user_avatar',$user_avatar)
										->with('email',$email)
										->with('check_rating_avg',$check_rating_avg)
										->with('ratings',$ratings)
										->with('avg_rating',$avg_rating)
										->with('weddingdate',$weddingdate)
										->with('check_photoslide',$check_photoslide)
										->with('photoslides',$photoslides);
				
	}
	public static function getDates(){
		$id_user 		= ChecklistController::id_user();
		$weddingdate 	= User::find($id_user)->weddingdate;

		return Carbon::parse($weddingdate)->format('d-m-Y');
	}

	// comment for vendor
	public function vendor_comment($id_vendor)
	{
		$id_user 		= Input::get('id_user');
		$cmt 			= Input::get('cmt');

		$firstname 		= User::where('id',$id_user)->get()->first()->firstname;
		$lastname 		= User::where('id',$id_user)->get()->first()->lastname;
		$user_name 		= $firstname.' '.$lastname;

		// insert comment to table vendor_comment

		$vendor_comment = new VendorComment();
		$vendor_comment->user=$id_user;
		$vendor_comment->user_name=$user_name;
		$vendor_comment->vendor=$id_vendor;
		$vendor_comment->content=$cmt;
		$vendor_comment->save();

		$user_avatar 	= User::where('id',$id_user)->get()->first()->avatar;
		// $avatar = base64_decode($user_avatar);

		// get data for show 
		$arComment 		= vendorComment::get()->last();

		$html 			= '';
		$html 			.="<div class='vendor_comment'>
							<div class='vendor_avatar'>
								<img src='/".$user_avatar."'>
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

	public function category($slug_cate){

		$compares 			= Session::get('compare');

		if(!Session::has('location')){
			$id_location 	= VendorController::location_last()->id;
		}else{
			$id_location 	= Session::get('location');
		}

		$id_cate 			= Category::where('slug', $slug_cate)->get()->first()->id;				
							
		$results 			= Vendor::where('category', $id_cate)->where('location',$id_location)->get();
		return View::make('list-vendor')->with('results', $results)
											->with('category_id', $id_cate)
											->with('compares', $compares);
		// return $results;
	}


	// get vendorLocationId
	private static function vendorLocationId($name)
	{
		if ($name==NULL) {
			return $location = NULL;
		} else {
			return $location = Location::where('name', $name)->get()->first()->id;
		}
	}

	// get vendorCategoryId
	private static function vendorCategoryId($name)
	{
		if ($name==NULL) {
			return $category = NULL;
		}
		else{
			return $category = Category::where('name', $name)->get()->first()->id;
		}
	}

	// action search from database
	private static function actionSearch( $name, $location, $category, $record, $offset)
	{
		// initialization Class Vendor
		$vendor 			= new Vendor();
		
		if(empty($name)&&empty($category))
		{
			return $results = $vendor->where('location',"=",$location)->take($record)->skip($offset)->get();
		}
		elseif(empty($name)&&!empty($category))
		{
			return $results = $vendor->where('location',$location)->where('category',$category)->take($record)->skip($offset)->get();
		}
		elseif(!empty($name)&&empty($category))
		{
			return $results = $vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->take($record)->skip($offset)->get();
		}
		else
		{
			return $results = $vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->where('category',$category)->take($record)->skip($offset)->get();
		}
	}

	// function search vendor
	public function search()
	{
		$compares 			= Session::get('compare');

		// get keyword from DataInput
		$name 				= Input::get('name');

		// get vendorLocationId from DataInput
		$location_name		= Input::get('location');
		$location 			= $this->vendorLocationId( $location_name );

		// get vendorCategoryId from DataInput
		$category_name 		= Input::get('category');
		$category 			= $this->vendorCategoryId( $category_name );

		// get data from actionSearch
		$results			= $this->actionSearch( $name, $location, $category, 6, 6 );
		
				
		return View::make('list-vendor')->with("results",$results)
										->with("location",$location)
										->with("compares", $compares);
		
	}

	// function lazyload vendor
	public function vendorLazyloadPhoto()
	{
		$i 					= Input::get('iOffset');
		$offset 			= ( $i * Input::get('offset') ) + 6;
		$record				= Input::get('offset');

		$compares 			= Session::get('compare');

		// get keyword from DataInput
		if ( (Input::get('name'))=='Từ tìm kiếm' ) {
			$name 			= NULL;
		} else {
			$name 			= Input::get('name');
		}

		// get vendorLocationId from DataInput
		$location_name		= Input::get('location');
		$location 			= $this->vendorLocationId( $location_name );

		// get vendorCategoryId from DataInput
		$category_name 		= Input::get('category');
		$category 			= $this->vendorCategoryId( $category_name );

		// get data from actionSearch
		$results			= $this->actionSearch( $name, $location, $category, $record, $offset );
		
				
		return View::make('list-vendor-lazyload-photo')->with("results",$results)
										->with("location",$location)
										->with("compares", $compares);
	}

	// function lazyload vendor
	public function vendorLazyloadList()
	{
		$i 					= Input::get('iOffset');
		$offset 			= ( $i * Input::get('offset') ) + 6;
		$record				= Input::get('offset');

		$compares 			= Session::get('compare');

		// get keyword from DataInput
		if ( (Input::get('name'))=='Từ tìm kiếm' ) {
			$name 			= NULL;
		} else {
			$name 			= Input::get('name');
		}

		// get vendorLocationId from DataInput
		$location_name		= Input::get('location');
		$location 			= $this->vendorLocationId( $location_name );

		// get vendorCategoryId from DataInput
		$category_name 		= Input::get('category');
		$category 			= $this->vendorCategoryId( $category_name );

		// get data from actionSearch
		$results			= $this->actionSearch( $name, $location, $category, $record, $offset );
		
				
		return View::make('list-vendor-lazyload-list')->with("results",$results)
										->with("location",$location)
										->with("compares", $compares);
	}

	
	public function post_Compare(){
		
		$gh 				 = Input::get('chk');

		Session::put('compare', $gh);
		$compares 			 = Session::get('compare');
		return View::make('compare')->with('compares', $compares);

	}

	// function add vendor for compare
	public function post_AddCompare(){

		$compares			 = Session::get('compare');

		$id 				 = Input::get('id');
		if( in_array($id, $compares) ){
			return Redirect::to('home-page')->with('compares', $compares);
		}
		else{
			$compares 		 = Session::set('compare', $id);
			return Redirect::to('home-page')->with('compares', $compares);
		}

	}

	// function remove vendor in array compare
	public function post_RemoveCompare($id){

		$t 					 = Session::get('compare');
		unset($t[$id]);
		$compares 			 = Session::set('compare', $t);

	}

	// function get a vendor last
	public static function last_vendor()
	{
		$vendor_id_last 	 = Vendor::get()->last()->id;
		return $vendor_id_last;
	}


	// get Location Name
	public static function getLocationName($id_vendor)
	{
		return Vendor::find($id_vendor)->location()->get()->first()->name;
	}

	// get Vendor Category
	public static function getVendorCategory($id_vendor)
	{
		return Vendor::where('id', $id_vendor)->get()->first()->category;
	}

	// get Category Slug
	public static function getCategorySlug($id_category)
	{
		return Category::where('id', $id_category)->get()->first()->slug;
	}

	// get Vendor About
	public static function getVendorAbout($inputData)
	{
		$about 				= strip_tags($inputData);
    	if($about)
    	{
    		$lengthstr=strlen($about);
    		if($lengthstr<410)
    		{
    			return $about;
    		}
    		else
    		{
    			$pos=strpos($about, ' ', 410);
				return substr($about,0,$pos )."...";
    		}	
    		                            	
    	}
    	else
    	{
    		return "Chưa có mô tả về Dịch vụ này.";
    	}
	}

	// get images
	public static function getImagesVendor($image)
	{
		$path 				= storage_path().'/'.$image;
		
		// Read image path, convert to base64 encoding
		$imageData 			= base64_encode(file_get_contents($path));

		// Format the image SRC:  data:{mime};base64,{data};
		$src 				= 'data: '.mime_content_type($path).';base64,'.$imageData;

		// Echo out a sample image
		echo '<img class="img-responsive" src="',$src,'">';

	}


	


}
