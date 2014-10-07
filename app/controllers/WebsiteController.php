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
				$backgrounds='';
				break;
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;

			case 6:
			$backgrounds='images/website/themes6/template_6.jpg';
			break;
			
			}			
			
		}

		switch ($id) {
			case 2:
				return View::make('website_user.themes2.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('id_web', $id_Web);
				break;
			case 3:
				return View::make('website_user.themes3.page.index')->with('website', $website)
																	->with('firstname', $firstname)
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
		$check_isset = WeddingWebsite::where('user', $id_user)->get()->count();

		// check when not data
		if( $check_isset==0 ){
			$new_website = new WeddingWebsite();
			$new_website->user = $id_user;
			$new_website->template = $id_tmp;
			$new_website->name_bride="Tên cô dâu";
			$new_website->name_groom="Tên chú rể";
			$new_website->about_groom="Giới thiệu về chú rể";
			$new_website->about_bride="Giới thiệu về cô dâu";
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
				$backgrounds='';
				break;
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;
			case 6:
				$backgrounds='images/website/themes6/template_6.jpg';
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
				$backgrounds='';
				break;
			case 5:
				$backgrounds='images/website/themes5/header-bg.jpg';
				break;


			case 6:
				$backgrounds='images/website/themes6/template_6.jpg';
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
		 
		 for($i=0; $i<=8; $i++)
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
			 			$tab_web->sort = $i;
			 			$tab_web-> save();

			 			
		 			} catch (Exception $e) {
		 				echo "khong luu du lieu dc";
		 			}
		 			
		 		}
		 	}

		 }
		 echo json_encode(array("removeid"=> $remove,"addid"=>$addtop));
		 exit();
		
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
		TabWebsite::find($id)->delete();
		
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
	
	public function changeImage()
	{

		$id_user = WebsiteController::id_user();	
		$id_tab=Input::get('id_tab');


		if(Input::hasFile('input_image'))
				{
					switch ($id_tab) {
						case 111:
							$image=Input::file('input_image');
							$filename = $id_user.'bride' . '.' .$image->getClientOriginalExtension();
							$path = 'images/website/themes2/avatar/'.$filename;
							Image::make($image->getRealPath())->resize(800, 600)->save($path);
							WeddingWebsite::where('user',$id_user)->update(
								array('avatar_bride'=>$path)					
								);

							return Redirect::route('website/edit/pages');
							break;

						case 222:
							$image=Input::file('input_image');
							$filename = $id_user.'groom' . '.' .$image->getClientOriginalExtension();
							$path = 'images/website/themes2/avatar/'.$filename;
							Image::make($image->getRealPath())->resize(800, 600)->save($path);
							WeddingWebsite::where('user',$id_user)->update(
								array('avatar_groom'=>$path)					
								);

							return Redirect::route('website/edit/pages');
							break;
						
						default:
							$check_photo=PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->count();
							if($check_photo>0)
							{	$name=PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->first()->photo;
								$years=date("Y");
								$months=date('m');
								$path_delete=public_path($name);
								File::delete($path_delete);
								File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);
								$image=Input::file('input_image');
								$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
								$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
								$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
								Image::make($image->getRealPath())->resize(800, 600)->save($path);
								PhotoTab::where('user',$id_user)->where('tab',$id_tab)->update(
									array('photo'=>$pathsave)					
									);
							    return Redirect::route('website/edit/pages');						
							}
							else
							{
								$phototab=new PhotoTab();
								$years=date("Y");
								$months=date('m');	
								File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);					
								$image=Input::file('input_image');
							  	$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
								$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
								$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
								Image::make($image->getRealPath())->resize(800, 600)->save($path);
								$phototab->user=$id_user;
								$phototab->photo=$pathsave;
								$phototab->tab = $id_tab;
								$phototab->save();
							    return Redirect::route('website/edit/pages');					
								
							}
							break;
					}
					

				} //end if
				
			
				
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
public function up_images_album(){
		$id_user = WebsiteController::id_user();	
		$id_tab=Input::get('id_tab_album');
		if(Input::hasFile('input_image_album'))
			{
				$phototab=new PhotoTab();
				$years=date("Y");
				$months=date('m');	
				File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);					
				$image=Input::file('input_image_album');
			  	$filename =str_random(10) . '.' .$image->getClientOriginalExtension();
				$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
				$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
				Image::make($image->getRealPath())->resize(800, 600)->save($path);
				$phototab->user=$id_user;
				$phototab->photo=$pathsave;
				$phototab->tab = $id_tab;
				$phototab->save();
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

	public function change_url(){
		$change_url=Input::get('url_website');
		$id_user=WebsiteController::id_user();
		WeddingWebsite::where('user',$id_user)->update(array('url'=>$change_url));
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


} // end Controller

