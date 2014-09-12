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
		
		$id_user = WebsiteController::id_user();

		$new_website = new WeddingWebsite();
		$new_website->user = $id_user;
		$new_website->save();

		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();
		
		
		// get username
		
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
		$lastname = User::where('id', WebsiteController::id_user())->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		$arFont = array("Calibri","Arial", "Verdana", "Times New Roman",
						"Adobe Gothic Std B", "Algerian", "AR BERKLEY",
						"French Script MT", "Vladimir Script", "Kunstler Script");

		return View::make('website_user.page_design')->with('firstname', $firstname)
													->with('arFont', $arFont)
													->with('website', $website);
	}

	// function change font for website
	public function updateFontWebsite()
	{
		$font_name = Input::get('font_name');

		$id_user = WebsiteController::id_user();

		WeddingWebsite::where('user',$id_user)->update(
		array(
			'font'=>$font_name
			));

		// return font in database
		
		$font = WeddingWebsite::where('user',$id_user)->get()->first()->font;

		echo $font;

	} // end function


	// function change font for website
	public function updateColorWebsite($index)
	{
		$color_design = Input::get('color_design');

		$id_user = WebsiteController::id_user();
		
		WeddingWebsite::where('user',$id_user)->update(
		array(
			'color'.$index=>$color_design
			));


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
		$arWebsite = WeddingWebsite::where('user',$id_user)->get()->count();

		if( $arWebsite>0 )
		{
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
		}else{
			switch ($index) {
				case 1:
					$color = "";
					break;
				case 2:
					$color = "";
					break;
				
				default:
					$color = "";
					break;
			}
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



	public function updateImagebackground()
	{	
		$id_user = WebsiteController::id_user();
		$check=WeddingWebsite::where('user',$id_user)->get()->count();
		if($check==0)
		{	if(Input::hasFile('input-image-modal'))
			{	
				$website= new WeddingWebsite();
				$website->user=$id_user;
			    $image=Input::file('input-image-modal');
			  	$filename =$image->getClientOriginalName();
				$path = public_path('images/website/background/' . $filename);
				Image::make($image->getRealPath())->resize(2000, 1500)->save($path);
			    $website->background=$filename ;
				$website->save();
				return Redirect::route('website/edit/pages');
			}
		}
		else
		{
			if(Input::hasFile('input-image-modal'))
			{	$name=WeddingWebsite::where('user',$id_user)->get()->first()->background;
				$path_delete=public_path('images/website/background/'.$name);
				File::delete($path_delete);
				$image=Input::file('input-image-modal');
			  	$filename =$image->getClientOriginalName();
				$path = public_path('images/website/background/' . $filename);
				Image::make($image->getRealPath())->resize(2000, 1500)->save($path);
				WeddingWebsite::where('user',$id_user)->update(
					array('background'=>$filename)
					
					);
			    return Redirect::route('website/edit/pages');
				}	
		   
		}
			
		
	}	
		
		

}

