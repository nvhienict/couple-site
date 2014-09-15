<?php

class WebsiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id_user = WebsiteController::id_user();
		
		$check_bg_website = WeddingWebsite::where('user',$id_user)->get()->count();

		if ($check_bg_website==0) {
			$backgrounds = "template_1.jpg";
		}else{
			$backgrounds = WeddingWebsite::where('user',$id_user)->get()->first()->background;
		}
		
		return View::make('website_user.index')->with('backgrounds',$backgrounds);
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
	public function template_1()
	{	
		$id_user = WebsiteController::id_user();
		
		$backgrounds=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		
		return View::make("website_user.page_temp")->with('backgrounds',$backgrounds);
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
		$id_user = WebsiteController::id_user();
		
		
		$backgrounds = WeddingWebsite::where('user',$id_user)->get()->first()->background;
		
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
		
		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();

		return View::make("website_user.edit_page_temp")->with('firstname', $firstname)
														->with('backgrounds',$backgrounds)
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
		$check_isset = WeddingWebsite::where('user', $id_user)->get()->count();

		// check when not data
		if( $check_isset==0 ){
			$new_website = new WeddingWebsite();
			$new_website->user = $id_user;
			$new_website->background = "template_1.jpg";
			$new_website->save();
		}
		$id_Web = WeddingWebsite::where('user', $id_user)->get()->first()->id;
		// check user had in table weddingwebsite
		$check_teb_website = TabWebsite::where('website', $id_Web)->get()->count();

		if ($check_teb_website==0) {
			// insert data from table tabs to tabwebsite
			$arTab = Tab::get();
			foreach ($arTab as $item_tab) {
				$tab_website = new TabWebsite();
				$tab_website->website = $id_Web;
				$tab_website->tab = $item_tab->id;
				$tab_website->title = $item_tab->title;
				$tab_website->content = $item_tab->content;
				$tab_website->visiable = $item_tab->visiable;
				$tab_website->titlestyle = $item_tab->titlestyle;
				$tab_website->video = $item_tab->video;
				$tab_website->map = $item_tab->map;
				$tab_website->sort = $item_tab->id;
				$tab_website->save();
			}
		}
		

		// get username
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
		$lastname = User::where('id', WebsiteController::id_user())->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		// get data from table website
		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();

		$arFont = array("Calibri","Arial", "Verdana", "Times New Roman",
						"Adobe Gothic Std B", "Algerian", "AR BERKLEY",
						"French Script MT", "Vladimir Script", "Kunstler Script");

		// get data from table 'tabs'
		$arTab = TabWebsite::get();

		return View::make('website_user.page_design')->with('firstname', $firstname)
													->with('arFont', $arFont)
													->with('website', $website)
													->with('arTab', $arTab)
													->with('id_web', $id_Web);
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

	// function change style for website
	public function updateStyleWebsite()
	{
		$style_website = Input::get('style_website');

		$id_user = WebsiteController::id_user();

		WeddingWebsite::where('user',$id_user)->update(
		array(
			'style'=>$style_website
			));

		// return style in database
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

		$tab= TabWebsite::find(Input::get('id'));
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
		"titlestyle"=>$tab->titlestyle
		);
		return $title;
	}


public function Post_update_Tab(){

	$id = Input::get('id_title');
	$title = Input::get('title');
	$titlestyle = Input::get('Align_title');
	$visiable = Input::get('hideTitle');

	$Tab = TabWebsite::where('id',$id)->update(
		array(
			'title'=>$title,
			'titlestyle'=>$titlestyle,
			'visiable'=>$visiable
			));
	$tab = array('title'=>$title,'titlestyle'=>$titlestyle,'visiable'=>$visiable);
	return $tab;
} 

	public function updateImagebackground()
	{	
		
		$id_user = WebsiteController::id_user();
			
			if(Input::hasFile('input_image_modal'))
			{	$name=WeddingWebsite::where('user',$id_user)->get()->first()->background;
				if($name!="template_1.jpg")
				{
					$path_delete=public_path('images/website/background/'.$name);
					File::delete($path_delete);
					$image=Input::file('input_image_modal');
				  	$filename =$image->getClientOriginalName();
					$path = public_path('images/website/background/' . $filename);
					Image::make($image->getRealPath())->resize(2000, 1500)->save($path);
					WeddingWebsite::where('user',$id_user)->update(
						array('background'=>$filename)					
						);
				    return Redirect::route('website/edit/pages');
					
				}
				else{
					$image=Input::file('input_image_modal');
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

