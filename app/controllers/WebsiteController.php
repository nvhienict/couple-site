<?php

class WebsiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function template()
	{
		$id_user = WebsiteController::id_user();

		$check_user_website = WeddingWebsite::where('user', $id_user)->get()->count();
		if ($check_user_website==0) {
			return View::make('website_user.template');
		} else {
			return View::make('website_user.index');
		}

	}


	public function index()
	{
		$id_user = WebsiteController::id_user();
		
		$check_bg_website = WeddingWebsite::where('user',$id_user)->get()->count();

		if ($check_bg_website==0) {
			// $backgrounds = "template_1.jpg";
			return View::make('website_user.template');
		}else{
			$img_tmp = WeddingWebsite::where('user',$id_user)->get()->first()->template;
			return View::make('website_user.index')->with('img_tmp',$img_tmp);
		}
		
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



	// format time count down
	public static function getCountDown(){
		$id_user = WebsiteController::id_user();

		return Carbon::parse(WeddingWebsite::where('user', $id_user)->get()->first()->count_down)->format('d-m-Y');
	}

	// get email user
	public static function getEmail(){
		$id_user = WebsiteController::id_user();

		return User::find($id_user)->email;
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
		
	}

	public function viewPrevious($id)
	{
		$id_tmp = $id;
		$id_user = WebsiteController::id_user();

		// get username
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;

		// get data from table website
		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();

		// get data from table 'tabs'
		$id_Web = WeddingWebsite::where('user', $id_user)->get()->first()->id;
		$arTab = TabWebsite::where('website',$id_Web)->get();
		
		$check=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		if(!empty($check))
		{
			$backgrounds=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		}
		else
		{
			switch ($id_tmp) {
			case 1:
				$backgrounds='images/website/themes1/template_1.jpg';
				break;

			case 2:
				$backgrounds='';
				break;

			case 3:
				$backgrounds='images/website/themes3/body_image_1.jpg';
				break;

			case 4:
			$backgrounds='';
			break;
			
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;

			case 6:
				$backgrounds='images/website/themes6/template_6.jpg';
			break;

			case 7:
				$backgrounds='images/website/themes7/template_7.jpg';
			break;

			case 8:
				$backgrounds='images/website/themes8/kiss1.jpg';
				break;

			case 9:
				$backgrounds='';
				break;
			case 10:
				$backgrounds='';
				break;
			case 11:
				$backgrounds='';
				break;
			}			
			
		}

		switch ($id) {
			case 2:
				return View::make('website_user.themes2.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;

			case 3:
				return View::make('website_user.themes3.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;

			case 4:
				return View::make('website_user.themes3.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;
			
			case 5:
				return View::make('website_user.themes5.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;

			case 6:
				return View::make('website_user.themes6.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;

			case 7:
			return View::make('website_user.themes7.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('backgrounds',$backgrounds)
																->with('id_web', $id_Web);
			break;	
			
			case 8:
				return View::make('website_user.themes8.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;

			case 9:
				return View::make('website_user.themes9.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;
			case 10:
				return View::make('website_user.themes10.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;

			case 11:
				return View::make('website_user.themes11.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web);
				break;		
			
			default:
				return View::make('website_user.themes.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('id_web', $id_Web)
																	->with('backgrounds',$backgrounds);
				break;
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		//
		try {
			
				$content=Input::get('content');
				$id_tab=Input::get('id_tab');
				$update_content=TabWebsite::where('id',$id_tab)->get()->first();
				$update_content->content=$content;
				$update_content->save();
				$content_re=TabWebsite::where('id',$id_tab)->get()->first()->content;
				echo json_encode(array('content'=>$content_re));
				exit();
	
		} catch (Exception $e) {
			echo "fail";
			
		}
		
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

	public function design($id)
	{
		
		$id_tmp = $id;

		$id_user = WebsiteController::id_user();
		$lastname=User::where('id',$id_user)->get()->first()->lastname;
		$check_isset = WeddingWebsite::where('user', $id_user)->get()->count();

		// check when not data
		if( $check_isset==0 ){
			$new_website = new WeddingWebsite();
			$new_website->user = $id_user;
			$new_website->template = $id_tmp;
			$new_website->name_bride="Tên Cô dâu";
			$new_website->name_groom="Tên Chú rể";
			$new_website->about_groom="Giới thiệu về chú rể";
			$new_website->about_bride="Giới thiệu về cô dâu";
			$new_website->url=$lastname.'-'.$id_user;
			$new_website->save();
		} else {
			WeddingWebsite::where('user',$id_user)->update(
				array(
					"template"=>$id_tmp
					));
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
				$tab_website->type = $item_tab->type;
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
						$type = array("st");
		foreach(TabWebsite::where('website', $id_Web)->get() as $tab_type)
		{
		 	array_unshift($type, $tab_type->type);
		}
		$typeTab = array_unique ($type);

		// get data from table 'tabs'
		$arTab = TabWebsite::where('website',$id_Web)->get();
		$check=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		if(!empty($check))
		{
			$backgrounds=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		}
		else
		{
			switch ($id_tmp) {
			case 1:
				$backgrounds='images/website/themes1/template_1.jpg';
				break;
			case 2:
				$backgrounds='';
				break;
			case 3:
				$backgrounds='images/website/themes3/body_image_1.jpg';
				break;
			case 4: 
				$backgrounds='';
				break;	
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;
			case 6:
				$backgrounds='images/website/themes6/template_6.jpg';
				break;
			case 7:
				$backgrounds='images/website/themes7/template_7.jpg';
				break;
			case 8:
				$backgrounds='images/website/themes8/kiss1.jpg';
				break;
			case 9:
				$backgrounds='images/website/themes8/kiss1.jpg';
				break;
			case 10:
				$backgrounds='';
				break;
			case 11:
				$backgrounds='';
				break;

			}
					
			
		}

		return View::make('website_user.page_design')->with('firstname', $firstname)
													->with('arFont', $arFont)
													->with('website', $website)
													->with('arTab', $arTab)
													->with('typeTab', $typeTab)
													->with('id_web', $id_Web)
													->with('backgrounds',$backgrounds)
													->with('id_tmp', $id_tmp);
		
	}

	public function editPage()
	{
		$id_user = WebsiteController::id_user();

		// get username
		$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
		$lastname = User::where('id', WebsiteController::id_user())->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		// get data from table website
		$website = WeddingWebsite::where('user',WebsiteController::id_user())->get();

		$arFont = array("Calibri","Arial", "Verdana", "Times New Roman",
						"Adobe Gothic Std B", "Algerian", "AR BERKLEY",
						"French Script MT", "Vladimir Script", "Kunstler Script");

		$id_Web = WeddingWebsite::where('user', $id_user)->get()->first()->id;
		// get data from table 'tabs'
		$arTab = TabWebsite::where('website',$id_Web)->get();

		$id_tmp = WeddingWebsite::where('user', $id_user)->get()->first()->template;

		$type = array("st");
		foreach(TabWebsite::where('website', $id_Web)->get() as $tab_type)
		{
		 	array_unshift($type, $tab_type->type);
		}
		$typeTab = array_unique ($type);

		$check=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		if(!empty($check))
		{
			$backgrounds=WeddingWebsite::where('user',$id_user)->get()->first()->background;
		}
		else
		{
			switch ($id_tmp) {
			case 1:
				$backgrounds='images/website/themes1/template_1.jpg';
				break;

			case 2:
				$backgrounds='';
				break;

			case 3:
				$backgrounds='images/website/themes3/body_image_1.jpg';
				break;
				
			case 4:
				$backgrounds='';
				break;
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;

			case 6:
				$backgrounds='images/website/themes6/template_6.jpg';
				break;

			case 7:
				$backgrounds='images/website/themes7/template_7.jpg';
			break;

			case 8:
				$backgrounds='images/website/themes8/kiss1.jpg';
			break;

			case 9:
				$backgrounds='';
			break;
			case 10:
				$backgrounds='';
			break;	
			
			case 11:
			$backgrounds='';
			break;		
			
			}
			
			
			
		}
		return View::make('website_user.page_design')->with('firstname', $firstname)
													->with('arFont', $arFont)
													->with('website', $website)
													->with('arTab', $arTab)
													->with('typeTab', $typeTab)
													->with('backgrounds',$backgrounds)
													->with('id_web', $id_Web)
													->with('id_tmp', $id_tmp);
	}
	public function addTopic(){
		$arrayTab = Input::get('id_tab');
		$arrayValue = Input::get("valueTab");

		$id_Web = WeddingWebsite::where('user', WebsiteController::id_user())->get()->first()->id;
		$type = array();
		$remove = array();
		$addtop = array();
		 foreach(TabWebsite::where('website', $id_Web)->get() as $tab_type)
		 {
		 	array_unshift($type, $tab_type->type);
		 }
		 $typeTab = array_unique ($type);
		 $countTab = Tab::count();
		 try {
			 for($i=0; $i<=$countTab; $i++)
			 {
			 	if (in_array($arrayValue[$i], $typeTab)) 
			 	{
			 		if ($arrayTab[$i]=="0") {
			 			TabWebsite::where('type',$arrayValue[$i])->delete();
			 			array_unshift($remove, $i);
			 		}
			 	}
			 	else
			 	{
			 		if ($arrayTab[$i]=="1") {
			 			try {
			 				array_unshift($addtop, $i);
			 				// Add tab moi vao
			 				$tab = Tab::where('type',$arrayValue[$i])->get()->first();
				 			$tab_web = new TabWebsite();
				 			$tab_web->title = $tab->title;
				 			$tab_web->type = $arrayValue[$i];
				 			$tab_web->website = $id_Web;
				 			$tab_web->content = $tab->content;
							$tab_web->visiable = $tab->visiable;
							$tab_web->titlestyle = $tab->titlestyle;
							$tab_web->video = $tab->video;
							$tab_web->map = $tab->map;
							$tab_web->sort = $countTab;
				 			$tab_web-> save();
			 			} catch (Exception $e) {
			 				echo "khong luu du lieu dc";
			 			}
			 			
			 		}
			 	}

			 }
		 } catch (Exception $e) {
		 	echo "không đc";
		 }
	 	foreach(TabWebsite::where('website', $id_Web)->get() as $index=>$tab){
	 		TabWebsite::where('id', $tab->id)->update(array('sort'=>$index + 1));
	 	}

		 echo json_encode(array("removeid"=> $remove,"addid"=>$addtop));
		 die();
		
	}
	public function updateName(){
		$nameBride = Input::get('nameBride');
		$nameGroom = Input::get('nameGroom');
		WeddingWebsite::where('user', WebsiteController::id_user())->update(
		array(
			'name_groom'=>$nameGroom,
			'name_bride'=>$nameBride
			));

		echo json_encode(array('name_groom'=>$nameGroom,'name_bride'=>$nameBride));
		exit();	
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
	public function delete_tab(){
		$id = Input::get('id');
		$id_Web = WeddingWebsite::where('user', WebsiteController::id_user())->get()->first()->id;
		TabWebsite::find($id)->delete();
		foreach(TabWebsite::where('website', $id_Web)->get() as $index=>$tab)
		{
	 		TabWebsite::where('id', $tab->id)->update(array('sort'=>$index + 1));
	 	}
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
		"type"=>$tab->type,
		"visiable"=>$visiable,
		"titlestyle"=>$tab->titlestyle
		);
		
		echo json_encode($title); exit();
	}
	public function sortable(){
		$newSort = Input::get('newSort');
		$arraySort = array();
		$sortTab = 0;
		foreach ($newSort as $key => $value) {
			if ($value != "") 
			{
				$sortTab = $sortTab + 1;
				TabWebsite::where("id",$value)->update(array('sort'=>$sortTab));
			}
		}
		echo json_encode($arraySort);
		exit();
	}
	public function reSort(){
		$newSort = Input::get('position');
		$idChange = Input::get('id');
		$mang = array("k");
		$oldSort = TabWebsite::where("id",$idChange)->get()->first()->sort;
		try {
				$idweb = input::get('id_web');
				$tabwebsite = TabWebsite::where('website', $idweb)->get();
				$countTab = $tabwebsite->count();
				if ($newSort>$countTab ) {
					foreach ($tabwebsite as  $tab) {
						if($tab->sort > $oldSort && $tab->sort <= $countTab){
							TabWebsite::where("id",$tab->id)->update(array('sort'=>$tab->sort -1));
						}
					}
					TabWebsite::where("id",$idChange)->update(array('sort'=>$countTab));
				}
				else
				{
					foreach ($tabwebsite as  $tab) {
						if($oldSort > $newSort && $tab->sort < $oldSort && $tab->sort >= $newSort){
							TabWebsite::where("id",$tab->id)->update(array('sort'=>$tab->sort + 1));
						}
						if($oldSort < $newSort &&  $tab->sort > $oldSort && $tab->sort <= $newSort){
							TabWebsite::where("id",$tab->id)->update(array('sort'=>$tab->sort - 1));
						}
					}
					TabWebsite::where("id",$idChange)->update(array('sort'=>$newSort));
				}
				
		} catch (Exception $e) {
				echo "lỗi update dữ liệu";
			}
		echo json_encode($countTab);
		exit();
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
					if(!empty($name))
					{	
						$year=date("Y");
						$month=date('m');
						$path_delete=public_path($name);
						File::delete($path_delete);
						$image=Input::file('input_image_modal');
					  	$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
						$path = public_path('images/website/'.$year.'/'.$month.'/'.$filename);
						$pathsave='images/website/'.$year.'/'.$month.'/'.$filename;
						Image::make($image->getRealPath())->resize(1500, 1000)->save($path);
						WeddingWebsite::where('user',$id_user)->update(
							array('background'=>$pathsave)					
							);
					    return Redirect::route('website/edit/pages');
						
					}
					else{
						$year=date("Y");
						$month=date('m');
						File::makeDirectory(public_path('images/website/'.$year.'/'.$month),$mode = 0775,true,true);
						$image=Input::file('input_image_modal');
						$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
						$path = public_path('images/website/'.$year.'/'.$month.'/'.$filename);
						$pathsave='images/website/'.$year.'/'.$month.'/'.$filename;
						Image::make($image->getRealPath())->resize(1500, 1000)->save($path);
						WeddingWebsite::where('user',$id_user)->update(
							array('background'=>$pathsave)						
							);
				    return Redirect::route('website/edit/pages');
						
					}		
				} //end if
				
			}
	 // end function

	/**
	* template 2
	*
	***/

	public function templateTabIndex()
	{

		return View::make('website_user.themes2.page.index');
	}

	public function changeTemp()
	{
		return View::make('website_user.template');
	}

	/* end template 2 */
	public function checkImageAlbum()
		{
			$id_user = WebsiteController::id_user();			
			$check=PhotoTab::where('user',$id_user)->get()->count();
			echo json_encode(array('check'=>$check));
			exit;
	}
	public function up_images_album(){
				$id_user = WebsiteController::id_user();	
				$id_tab=Input::get('id_tab_album');
				if(Input::hasFile('input_image_album'))
					{	$images=Input::file('input_image_album');
						foreach ($images as $image) 
						{
							$phototab=new PhotoTab();
							$years=date("Y");
							$months=date('m');	
							File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);					
						  	$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
							$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
							$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
							Image::make($image->getRealPath())->resize(800, 600)->save($path);
							$phototab->user=$id_user;
							$phototab->photo=$pathsave;
							$phototab->tab = $id_tab;
							$phototab->save();
						}
						return Redirect::route('website/edit/pages');
					   
					}
	
			}
	public function load_album(){
		try {
			$id_user = WebsiteController::id_user();
			$id_tab=Input::get('id_tab_album');
			$images=PhotoTab::where('user',$id_user)->get();

			echo json_encode(array('images'=>$images));			
			} 
		catch (Exception $e)
			{
				echo "fail";
			}		
	}
	public function del_album(){
		try 
		{ 	$id_user=WebsiteController::id_user();
			$id_images_del=array();
			$id_images_del=Input::get('id_images');			
				foreach ($id_images_del as $id_images_del) 
				{	
					$name=PhotoTab::where('user',$id_user)->where('id',$id_images_del)->get()->first()->photo;
					$path_delete=public_path($name);
					File::delete($path_delete);
					PhotoTab::where('user',$id_user)->where('id',$id_images_del)->delete();
				}						
		} 
		catch (Exception $e) 
		{
			echo('fail');
		}
	}
		
	/*template_6*/
	public function template_6()
	{
		return View::make('website_user.themes6.page.index');
	}
	//url_website
	public function load_url(){
		$id_user=WebsiteController::id_user();	
		$recent_url=WeddingWebsite::where('user',$id_user)->get()->first()->url;	
		echo json_encode(array('url'=>$recent_url));
		exit();
	}

	public function change_url(){
		$id_user=WebsiteController::id_user();
		$change_url=Input::get('url_website');
		$recent_url=WeddingWebsite::where('user',$id_user)->get()->first()->url;
		if (empty($change_url))
		 {
			echo json_encode(array('error_url'=>'Url không được trống.','res_url'=>$recent_url, 'color'=>'red'));
			exit();
		}
		else
		{
			if (WeddingWebsite::where('user','!=',$id_user)->where('url',$change_url)->get()->count()) {
			echo json_encode(array('error_url'=>'Url đã tồn tại, nhập vào url khác.','res_url'=>$recent_url, 'color'=>'red'));
			exit();
			} 
			else
		 	{			
			WeddingWebsite::where('user',$id_user)->update(array('url'=>$change_url));
			echo json_encode(array('res_url'=>$change_url,'error_url'=>'Url đã cập nhật thành công.','color'=>'#5574C9'));
			exit();
			}				
		}							
	}

	public function url_website($url){
		// get data from table website
		$website_tamp=WeddingWebsite::where('url',$url)->get()->first();
		$id_website=$website_tamp->id;
		$template=$website_tamp->template;
		$user=$website_tamp->user;
		$firstname = User::where('id',$user)->get()->first()->firstname;
		$email=User::where('id',$user)->get()->first()->email;
		$date_url=Carbon::parse(User::find($user)->weddingdate)->format('d-m-Y');
		$count_down_url=Carbon::parse(WeddingWebsite::where('user', $user)->get()->first()->count_down)->format('d-m-Y');
		$website=WeddingWebsite::where('url',$url)->get();		
		// get data from table 'tabs'
		$arTab = TabWebsite::where('website',$id_website)->get();

		
		$check=WeddingWebsite::where('user',$user)->get()->first()->background;
		if(!empty($check))
		{
			$backgrounds=WeddingWebsite::where('user',$user)->get()->first()->background;
		}
		else
		{
			switch ($template) {
			case 1:
				$backgrounds='images/website/themes1/template_1.jpg';
				break;
			case 2:
				$backgrounds='';
				break;
			case 3:
				$backgrounds='images/website/themes3/body_image_1.jpg';
				break;

			case 4:
				$backgrounds='';
				break;	
	
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;

			case 6:
				$backgrounds='images/website/themes6/template_6.jpg';
			break;

			case 7:
				$backgrounds='images/website/themes7/template_7.jpg';
			break;

			case 8:
				$backgrounds='images/website/themes8/kiss1.jpg';
			break;

			case 9:
				$backgrounds='';
				break;
			case 10:
				$backgrounds='';
			break;
			}			
			
		}

		switch ($template) {
			case 2:
				return View::make('website_user.themes2.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('email',$email)
																	->with('count_down_url',$count_down_url);
				break;
			case 3:
				return View::make('website_user.themes3.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('count_down_url',$count_down_url);
				break;

			case 4:
				return View::make('website_user.themes4.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
															->with('email',$email)
																->with('count_down_url',$count_down_url);
				break;
			
			case 5:
				return View::make('website_user.themes5.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('count_down_url',$count_down_url);
				break;

			case 6:
				return View::make('website_user.themes6.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url);
				break;
			case 7:
				return View::make('website_user.themes7.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url);
				break;

			case 8:
				return View::make('website_user.themes8.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url);
				break;

			case 9:
				return View::make('website_user.themes9.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url);
				break;
			
			case 10:
				return View::make('website_user.themes10.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
															->with('email',$email)
																->with('count_down_url',$count_down_url);
				break;

			case 11:
				return View::make('website_user.themes11.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('count_down_url',$count_down_url);
				break;	
			default:
				return View::make('website_user.themes.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('id_web', $id_website)
																	->with('backgrounds',$backgrounds)
																	->with('date_url',$date_url);
				break;
		}


	}




	public function updateAboutGroom()
	{
		$content = Input::get('content');

		WeddingWebsite::where('user', WebsiteController::id_user())->update(
		array(
			'about_groom'=>$content
			));

		echo json_encode(array('content'=>$content));
		exit();	

	} // end function updateAboutGroom()

	public function updateAboutBride()
	{
		$content = Input::get('content');

		WeddingWebsite::where('user', WebsiteController::id_user())->update(
		array(
			'about_bride'=>$content
			));

		echo json_encode(array('content'=>$content));
		exit();	

	} // end function updateAboutGroom()

	public function timeCountDown()
	{
		$count_down = Input::get('data_input');
		$cv_count_down = Carbon::parse($count_down)->format('Y-m-d');

		WeddingWebsite::where('user', WebsiteController::id_user())->update(
		array(
			'count_down'=>$cv_count_down
			));

	} // end function timeCountDown()

	public function changeMap()
	{
		$id_user = WebsiteController::id_user();			
		$latitude=Input::get('latitude');
		$longitude=Input::get('longitude');
		WeddingWebsite::where('user',$id_user)->update(
			array(
					'latitude'=>$latitude,
					'longitude'=>$longitude
				));
		
	}


	// upload images ajax
	public function upload_images_ajax()
	{

		$id_user = WebsiteController::id_user();	
		$id_tab = Input::get('id_tab');

		//
		$file = Input::file('image');
		$input = array('image' => $file);
		$rules = array(
			'image' => 'image'
		);
		$validator = Validator::make($input, $rules);
		if ( $validator->fails() )
		{
			return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

		}
		else 
		{

			// upload images for bride and groom
			switch ($id_tab) {
				case 111:
					$image = Input::file('image');
					$filename = $id_user.'bride' . '.' .$image->getClientOriginalExtension();
					$pathsave = 'images/website/themes2/avatar/'.$filename;
					Image::make($image->getRealPath())->resize(800, 600)->save($pathsave);
					WeddingWebsite::where('user',$id_user)->update(
						array('avatar_bride'=>$pathsave)					
						);

					break;

				case 222:
					$image = Input::file('image');
					$filename = $id_user.'groom' . '.' .$image->getClientOriginalExtension();
					$pathsave = 'images/website/themes2/avatar/'.$filename;
					Image::make($image->getRealPath())->resize(800, 600)->save($pathsave);
					WeddingWebsite::where('user',$id_user)->update(
						array('avatar_groom'=>$pathsave)					
						);

					break;
			// end load images for bride and groom

			default:

				$check_photo=PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->count();
				if($check_photo>0)
				{	$name=PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->first()->photo;
					$years=date("Y");
					$months=date('m');
					$path_delete=public_path($name);
					File::delete($path_delete);
					File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);
					$image = Input::file('image');
					$filename = str_random(10) . '.' .$image->getClientOriginalExtension();
					$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
					$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
					Image::make($image->getRealPath())->resize(800, 600)->save($path);
					PhotoTab::where('user',$id_user)->where('tab',$id_tab)->update(
						array('photo'=>$pathsave)					
						);
				    						
				}
				else
				{
					$phototab = new PhotoTab();
					$years = date("Y");
					$months = date('m');	
					File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);					
					$image = Input::file('image');
				  	$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
					$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
					$pathsave = 'images/website/'.$years.'/'.$months.'/'.$filename;
					Image::make($image->getRealPath())->resize(800, 600)->save($path);
					$phototab->user = $id_user;
					$phototab->photo = $pathsave;
					$phototab->tab = $id_tab;
					$phototab->save();
				    					
					
				}
				break;
			} // end switch()

			return Response::json(
				['success' => true, 
				'id_tab' => $id_tab, 
				'file' => asset($pathsave)]
			);
		}
	}

	// end upload images ajax
	// update infor about groom and bride
	public function update_infor(){
		$name_groom=Input::get('name_groom');
		$name_bride=Input::get('name_bride');
		$about_groom=Input::get('about_groom');
		$about_bride=Input::get('about_bride');
		$id_user=WebsiteController::id_user();
		WeddingWebsite::where('user',$id_user)->update(
			array('name_groom'=>$name_groom,'name_bride'=>$name_bride,
				'about_groom'=>$about_groom,'about_bride'=>$about_bride));
		echo json_encode(array('message_infor'=>'Cập nhật thông tin thành công'));
		exit();
		
	}

	public function getInfor(){
		$id_user=WebsiteController::id_user();
		$infor=WeddingWebsite::where('user',$id_user)->get()->first();
		echo json_encode(array('name_groom'=>$infor->name_groom,'name_bride'=>$infor->name_bride,
								'about_bride'=>$infor->about_bride,'about_groom'=>$infor->about_groom));
		exit();
	}



} // end Controller






