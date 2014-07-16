<?php

class VendorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function search()
	{
		$name=Input::get('name');
		$location=Input::get('location');
		$category=Input::get('category');
		$vendor= new Vendor();
		if(empty($name)&&empty($location)&&empty($category))
		{
			$results=$vendor->get()->orderBy('name', 'desc');
		}
		elseif(!empty($name)&&empty($category)&&empty($location))
		{
			$results=$vendor->where('name', 'LIKE', "%$name%")->get();

		}

		elseif(empty($name)&&empty($category)&&!empty($location))
		{
			$results=$vendor->where('location',$location)->get();
		}

		elseif(empty($name)&&empty($location)&&!empty($category))
		{
			$results=$vendor->where('category',$category)->get();
		}

		elseif(empty($name)&&!empty($location)&&!empty($category))
		{
			$results=$vendor->where('location',$location)->where('category',$category)->get();
		}

		elseif(!empty($name)&&!empty($location)&&empty($category))
		{
			$results=$vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->get();
		}

		elseif(!empty($name)&&empty($location)&&!empty($category))
		{
			$results=$vendor->where('category',$category)->where('name', 'LIKE', "%$name%")->get();
		}

		elseif(!empty($name)&&!empty($location)&&!empty($category))
		{
			$results=$vendor->where('location',$location)->where('name', 'LIKE', "%$name%")->where('category',$category)->get();
		}

		return View::make('list-vendor')->with("results",$results);

	}


}
