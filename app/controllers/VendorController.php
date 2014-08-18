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
		
		$vendor=Vendor::where('id',$id)->get()->first();
		return View::make("detail-vendor")->with("vendor",$vendor);

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
