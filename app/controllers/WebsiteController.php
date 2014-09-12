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

	// format weddingdate
	public static function getDates(){
		$id_user = WebsiteController::id_user();

		return Carbon::parse(User::find($id_user)->weddingdate)->format('d-m-Y');
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
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
		
		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();

		return View::make("website_user.edit_page_temp")->with('firstname', $firstname)
														->with('website', $website);
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

		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();
		// get username
		
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
		$lastname = User::where('id', WebsiteController::id_user())->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		$arFont = array("Arial", "Verdana", "Times New Roman", "Open Sans",
						"Open Sans Condensed", "Roboto Condensed");

		return View::make('website_user.page_design')->with('firstname', $firstname)
													->with('arFont', $arFont)
													->with('website', $website);
	}

	// function change font for website
	public function updateFontWebsite()
	{
		$font_name = Input::get('font_name');

		$id_user = WebsiteController::id_user();

		$check_isset = WeddingWebsite::where('user',$id_user)->get()->count();

		if ($check_isset==0) {
			$website = new WeddingWebsite();
			$website->user = $id_user;
			$website->font = $font_name;
			$website->save();
		}else{
			WeddingWebsite::where('user',$id_user)->update(
			array(
				'font'=>$font_name
				));

		}

		// return font in database
		
		$font = WeddingWebsite::where('user',$id_user)->get()->first()->font;

		echo $font;

	} // end function


	// function change font for website
	public function updateColorWebsite($index)
	{
		$color_design = Input::get('color_design');

		$id_user = WebsiteController::id_user();

		$check_isset = WeddingWebsite::where('user',$id_user)->get()->count();

		if ($check_isset==0) {
			$website = new WeddingWebsite();
			$website->user = $id_user;
			$website->color.$index = $color_design;
			$website->save();
		}else{
			WeddingWebsite::where('user',$id_user)->update(
			array(
				'color'.$index=>$color_design
				));

		}

		// return color in database
		switch ($index) {
			case 1:
				$color = WeddingWebsite::where('user',$id_user)->get()->first()->color1;
				break;
			case 2:
				$color = WeddingWebsite::where('user',$id_user)->get()->first()->color2;
				break;
			
			default:
				$color = WeddingWebsite::where('user',$id_user)->get()->first()->color3;
				break;
		}
		echo $color;


	} // end function
	
	

	public function updateColorWebsite1()
	{
		WebsiteController::updateColorWebsite(1);
		
	} // end function
	public function updateColorWebsite2()
	{
		WebsiteController::updateColorWebsite(2);

	} // end function
	public function updateColorWebsite3()
	{
		WebsiteController::updateColorWebsite(3);

	} // end function

	
	// function return color in database
	public static function returnColor($index)
	{

		$id_user = WebsiteController::id_user();

		switch ($index) {
			case 1:
				$color = WeddingWebsite::where('user',$id_user)->get()->first()->color1;
				break;
			case 2:
				$color = WeddingWebsite::where('user',$id_user)->get()->first()->color2;
				break;
			
			default:
				$color = WeddingWebsite::where('user',$id_user)->get()->first()->color3;
				break;
		}
		return $color;
	}

	// function reset color default
	public function resetColor()
	{
		$id_user = WebsiteController::id_user();
		WeddingWebsite::where('user',$id_user)->update(
			array(
				'color1'=>'',
				'color2'=>'',
				'color3'=>''
				));

		echo $color='';

	}
	

public function getTab(){

		$tab= Tab::find(Input::get('id'));
		$visiable = '<input type="checkbox" name="hideTitle" id="hideTitle">';
		if($tab->visiable == 1)
		{
			$visiable = '<input type="checkbox" name="hideTitle" id="hideTitle" checked>';
		}
		$title=array(
		"id"=>$tab->id,
		"title"=>$tab->title,
		"content"=>$tab->content,
		"visiable"=>$visiable,
		"titleStyle"=>$tab->titleStyle
		);
		return $title;
	}

}
