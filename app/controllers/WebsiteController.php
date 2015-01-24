<?php

class WebsiteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	// get content swf_enddoaction
	public static function getImages(){
		$id_user = WebsiteController::id_user();
		$images = PhotoTab::where('user',$id_user)->get();
		return $images;
		die();
	}
	
	public static function getWeb(){
		$id_user 	= WebsiteController::id_user();
		$web = WeddingWebsite::where('user',$id_user)->get()->first();
		return $web;
		die();
	}
	public static function getTabIndex(){
		$id_web = WebsiteController::getWeb()->id;
		$tab = TabWebsite::where('website',$id_web)->get();
		return $tab;
	}

	public function getContent(){
		$id_user 	= $this->id_user();
		$id_web 	= WeddingWebsite::where('user',$id_user)->get()->first()->id;
		$id_tab 	= Input::get('id_tab');
		$type 		= TabWebsite::where('website',$id_web)->where('id',$id_tab)->get()->first()->title;
		$content 	= TabWebsite::where('website',$id_web)->where('id',$id_tab)->get()->first()->content;
		echo json_encode(array('title'=>$type,'content'=>$content));
		die();
	}

	public function updateContent(){
		$id_user 	= $this->id_user();
		$id_web 	= WeddingWebsite::where('user',$id_user)->get()->first()->id;
		$id_tab 	= Input::get('id_tab');
		$content 	= Input::get('content');
		TabWebsite::where('website',$id_web)->where('id',$id_tab)->update(array('content'=>$content));
		echo json_encode(array('content'=>$content));
		die();
	}

	public function index()
	{
		$id_user = WebsiteController::id_user();
		$check_bg_website = WeddingWebsite::where('user',$id_user)->get()->count();
		if (empty($check_bg_website)) {

			return View::make('website_user.template');

		}else{

			$id_tmp = WeddingWebsite::where('user',$id_user)->get()->first()->template;
			return WebsiteController::design($id_tmp);
		}
		
	}

	public function headerWebsite($id){
		$id_tmp = $id;
		$id_user = WebsiteController::id_user();
		$id_web = $this->getWeb();

		if (!empty($id_web->id)) {
			WeddingWebsite::where('user',$id_user)->update(array('template'=>$id_tmp));
			return WebsiteController::design($id_tmp);
		} else {
			$lastname = User::where('id',$id_user)->get()->first()->lastname;
			$web = new WeddingWebsite();
			$web->user = $id_user;
			$web->template = $id_tmp;
			$web->url = Str::slug($lastname.'-'.$id_user);
			$web->name_bride = "Tên Cô Dâu";
			$web->name_groom = "Tên Chú Rể";
			$web->about_bride = "Thông tin về cô dâu";
			$web->about_groom ="Thông tin về chú rể";
			$web->save();
			$id_Web = $this->getWeb()->id;
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
			return View::make('website_user.header')->with('id_tmp',$id_tmp);
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
		$id_tmp 	= $id;
		$id_user 	= WebsiteController::id_user();

		// get username
		$firstname 	= User::where('id', WebsiteController::id_user())->get()->first()->firstname;

		// get data from table website
		$website 	= WeddingWebsite::where('user',WebsiteController::id_user())->get();

		// get data from table 'tabs'
		$id_Web 	= WeddingWebsite::where('user', $id_user)->get()->first()->id;
		$arTab 		= TabWebsite::where('website',$id_Web)->get();
		
		$check 		= WeddingWebsite::where('user',$id_user)->get()->first()->background;
		$url 		= WeddingWebsite::where('user',$id_user)->get()->first()->url;

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

			case 12:
				$backgrounds='';
				break;
			case 13:
				$backgrounds='';
				break;

			case 14:
				$backgrounds='';
				break;	

			case 15:
				$backgrounds='images/website/themes15/bg_pic.jpg';
				break;
			case 16:
				$backgrounds='';
				break;	
			case 17:
				$backgrounds='';
				break;
			case 18:
				$backgrounds='';
				break;

			case 19:
				$backgrounds='';
				break;

			case 20:
				$backgrounds='images/website/themes20/template_20.jpg';
				break;

			case 21:
				$backgrounds='';
				break;

			}
			
		}

		switch ($id) {
			case 2:
				return View::make('website_user.themes2.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 3:
				return View::make('website_user.themes3.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 4:
				return View::make('website_user.themes4.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			
			case 5:
				return View::make('website_user.themes5.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 6:
				return View::make('website_user.themes6.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 7:
			return View::make('website_user.themes7.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('backgrounds',$backgrounds)
																->with('id_web', $id_Web)
																->with('url', $url)
																->with('web_fb',$this->getWeb()->background);
			break;	
			
			case 8:
				return View::make('website_user.themes8.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 9:
				return View::make('website_user.themes9.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			case 10:
				return View::make('website_user.themes10.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 11:
				return View::make('website_user.themes11.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 12:
				return View::make('website_user.themes12.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			case 13:
				return View::make('website_user.themes13.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;	
			case 14:
				return View::make('website_user.themes14.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 15:
				return View::make('website_user.themes15.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			case 16:
				return View::make('website_user.themes16.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			case 17:
				return View::make('website_user.themes17.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			case 18:
				return View::make('website_user.themes18.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 19:
				return View::make('website_user.themes19.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 20:
				return View::make('website_user.themes20.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;

			case 21:
				return View::make('website_user.themes21.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
			
			default:
				return View::make('website_user.themes.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('id_web', $id_Web)
																	->with('backgrounds',$backgrounds)
																	->with('url', $url)
																	->with('web_fb',$this->getWeb()->background);
				break;
		}
	}

	// xem truoc website khj chua chọn

	public function viewTheme($id)
	{	

		$id_tmp = $id;
		$id_user =$this->id_user();

		if (!empty($this->getWeb()->id )) {
			return WebsiteController::viewPrevious($id_tmp);
		} 
		else 
		{
			$firstname = User::where('id',$id_user)->get()->first()->firstname;

			// get data from table website
			$website = WeddingWebsite::where('user',2)->get();

			// get data from table 'tabs'
			$id_Web = WeddingWebsite::where('user', 2)->get()->first()->id;
			$arTab = TabWebsite::where('website',$id_Web)->get();
			$url = WeddingWebsite::where('user',2)->get()->first()->url;
			$check=WeddingWebsite::where('user',2)->get()->first()->background;
			if(!empty($check))
			{
				$backgrounds=WeddingWebsite::where('user',2)->get()->first()->background;
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

				case 12:
					$backgrounds='';
					break;
				case 13:
					$backgrounds='';
					break;

				case 14:
					$backgrounds='';
					break;	

				case 15:
					$backgrounds='images/website/themes15/bg_pic.jpg';
					break;
				case 16:
					$backgrounds='';
					break;	
				case 17:
					$backgrounds='';
					break;
				case 18:
					$backgrounds='';
					break;

				case 19:
					$backgrounds='';
					break;

				case 20:
					$backgrounds='images/website/themes20/template_20.jpg';
					break;

				case 21:
					$backgrounds='';
					break;

				}
				
			}

			switch ($id) {
				case 2:
					return View::make('website_user.themes2.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 3:
					return View::make('website_user.themes3.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 4:
					return View::make('website_user.themes4.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				
				case 5:
					return View::make('website_user.themes5.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 6:
					return View::make('website_user.themes6.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 7:
				return View::make('website_user.themes7.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_Web)
																	->with('url',$url);
				break;	
				
				case 8:
					return View::make('website_user.themes8.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 9:
					return View::make('website_user.themes9.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				case 10:
					return View::make('website_user.themes10.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 11:
					return View::make('website_user.themes11.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 12:
					return View::make('website_user.themes12.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				case 13:
					return View::make('website_user.themes13.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;	
				case 14:
					return View::make('website_user.themes14.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 15:
					return View::make('website_user.themes15.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				case 16:
					return View::make('website_user.themes16.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				case 17:
					return View::make('website_user.themes17.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				case 18:
					return View::make('website_user.themes18.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 19:
					return View::make('website_user.themes19.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 20:
					return View::make('website_user.themes20.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;

				case 21:
					return View::make('website_user.themes21.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('backgrounds',$backgrounds)
																		->with('id_web', $id_Web)
																		->with('url',$url);
					break;
				
				default:
					return View::make('website_user.themes.page.index')->with('website', $website)
																		->with('firstname', $firstname)
																		->with('id_web', $id_Web)
																		->with('backgrounds',$backgrounds)
																		->with('url',$url);
					break;
			}	
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

	public function design($id){
			$id_tmp = $id;
			$id_user = $this->id_user();

			// get username
			$firstname = User::where('id', WebsiteController::id_user())->get()->first()->firstname;
			$lastname = User::where('id', WebsiteController::id_user())->get()->first()->lastname;
			$user_name = $firstname.' '.$lastname;

			// get web 
			$website = WeddingWebsite::where('user',$id_user)->get();
			$id_Web = WeddingWebsite::where('user', $id_user)->get()->first()->id;

			// get data from table 'tabs'
			$arTab = TabWebsite::where('website',$id_Web)->get();

			$id_tmp = WeddingWebsite::where('user', $id_user)->get()->first()->template;
			WeddingWebsite::where('user',$id_user)->update(array('template'=>$id_tmp));
			$check_bg = WeddingWebsite::where('user',$id_user)->get()->first()->background;
			if (!empty($check_bg)) {
				$backgrounds=WeddingWebsite::where('user',$id_user)->get()->first()->background;				
			} else {
				switch ( $id_tmp ) {
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
					case 12:
						$backgrounds='';
						break;
					case 13:
						$backgrounds='';
						break;
					case 14:
						$backgrounds='';
						break;

					case 15:
						$backgrounds='images/website/themes15/bg_pic.jpg';
						break;
					case 16:
						$backgrounds='';
						break;
					case 17:
						$backgrounds='';
						break;
					case 18:
						$backgrounds='';
						break;

					case 19:
						$backgrounds='';
						break;
					case 20:
						$backgrounds='images/website/themes20/template_20.jpg';
						break;
					case 21:
						$backgrounds='';
						break;
				}
			}
			
			return View::make('website_user.page_design')->with('firstname', $firstname)
															->with('website', $website)
															->with('arTab', $arTab)
															->with('backgrounds',$backgrounds)
															->with('id_web', $id_Web)
															->with('id_tmp', $id_tmp);

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

	
	public function loadTitle(){
		$id_tab = Input::get('id_tab');
		$title = TabWebsite::where('id',$id_tab)->get()->first()->title;
		return Response::json(array('title'=>$title));
	}
	public function updateTitle(){
		$id_tab = Input::get('id_tab');
		$ck_visiable = Input::get('ck_visiable');
		$title = Input::get('title');
		TabWebsite::where('id',$id_tab)->update(array('title'=>$title,'visiable'=>$ck_visiable));
		return Response::json(array('title'=>$title,'ck'=>$ck_visiable));
	}
	public function updateVisiable(){
		$id_tab = Input::get('id_tab');
		$visiable = Input::get('visiable');
		TabWebsite::where('id',$id_tab)->update(array('visiable'=>$visiable));
		return Response::json(array('visiable'=>$visiable));

	}
	// public function addTitle(){
	// 	$id_hide = Input::get('id_hide');
	// 	$id_show = Input::get('id_show');
	// 	$id_web = $this->getWeb()->id;
	// }

	public function updateImagebackground()
	{	
		
		$id_user = WebsiteController::id_user();		
		$file = Input::file('file');	
		if(Input::hasFile('file'))
		{	$name=WeddingWebsite::where('user',$id_user)->get()->first()->background;
			if(!empty($name))
			{	
				$year=date("Y");
				$month=date('m');
				$path_delete=public_path($name);
				File::delete($path_delete);
			  	$filename ='bg'.str_random(10) . '.' .$file->getClientOriginalExtension();
				$path = public_path('images/website/'.$year.'/'.$month.'/'.$filename);
				$pathsave='images/website/'.$year.'/'.$month.'/'.$filename;
				Image::make($file->getRealPath())->resize(1500, 1000)->save($path);
				WeddingWebsite::where('user',$id_user)->update(
					array('background'=>$pathsave)					
					);				
			}
			else{
				$year=date("Y");
				$month=date('m');
				File::makeDirectory(public_path('images/website/'.$year.'/'.$month),$mode = 0775,true,true);
				$filename ='bg'.str_random(10) . '.' .$file->getClientOriginalExtension();
				$path = public_path('images/website/'.$year.'/'.$month.'/'.$filename);
				$pathsave='images/website/'.$year.'/'.$month.'/'.$filename;
				Image::make($file->getRealPath())->resize(1500, 1000)->save($path);
				WeddingWebsite::where('user',$id_user)->update(
					array('background'=>$pathsave)						
					);
			}		
		} //end if
		
	}
	 // end function

	public function loadBg(){
		$id_user = $this->id_user();
		$bg = asset($this->getWeb()->background);
		return Response::json(array('bg'=>$bg));
	}

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

	public function del_album(){
		try 
		{ 	
			$id_user=WebsiteController::id_user();
			$id_photo=Input::get('id_photo');								
			$name=PhotoTab::where('user',$id_user)->where('id',$id_photo)->get()->first()->photo;
			$path_delete=public_path($name);
			File::delete($path_delete);
			PhotoTab::where('user',$id_user)->where('id',$id_photo)->delete();										
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

	function loadURL(){
		$id_user = $this->id_user();
		$web = $this->getWeb();
		$url = $web->url;
		return Response::json(array('url'=>$url));
	}
	
	public function url_website($url){
		// get data from table website
		$website_tamp 		= WeddingWebsite::where('url',$url)->get()->first();
		$id_website 		= $website_tamp->id;
		$template 			= $website_tamp->template;
		$user 				= $website_tamp->user;
		$firstname 			= User::where('id',$user)->get()->first()->firstname;
		$email 				= User::where('id',$user)->get()->first()->email;
		$date_url 			= Carbon::parse(User::find($user)->weddingdate)->format('d-m-Y');
		$count_down_url 	= Carbon::parse(WeddingWebsite::where('user', $user)->get()->first()->count_down)->format('d-m-Y');
		$website 			= WeddingWebsite::where('url',$url)->get();		
		// get data from table 'tabs'
		$arTab 				= TabWebsite::where('website',$id_website)->get();

		
		$check=WeddingWebsite::where('user',$user)->get()->first()->background;
		if(!empty($check))
		{
			$backgrounds 	= WeddingWebsite::where('user',$user)->get()->first()->background;
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
				$backgrounds='images/website/themes3/body_image_1.jpg';
			break;
			case 11:
				$backgrounds='';
			break;
			case 12:
				$backgrounds='';
			break;
			case 13:
				$backgrounds='';
			break;
			case 14:
				$backgrounds='';
			break;

			case 15:
				$backgrounds='images/website/themes15/bg_pic.jpg';
				break;
			case 16:
				$backgrounds='';
			break;

			case 17:
				$backgrounds='';
				break;
			case 18:
				$backgrounds='';
				break;

			case 19:
				$backgrounds='';
				break;
			case 20:
				$backgrounds='images/website/themes20/template_20.jpg';
				break;
			case 21:
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
																	->with('count_down_url',$count_down_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;
			case 3:
				return View::make('website_user.themes3.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('count_down_url',$count_down_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;

			case 4:
				return View::make('website_user.themes4.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;
			
			case 5:
				return View::make('website_user.themes5.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('count_down_url',$count_down_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;

			case 6:
				return View::make('website_user.themes6.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;
			case 7:
				return View::make('website_user.themes7.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;

			case 8:
				return View::make('website_user.themes8.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;

			case 9:
				return View::make('website_user.themes9.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('backgrounds',$backgrounds)
																	->with('id_web', $id_website)
																	->with('date_url',$date_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
				break;
			
			case 10:
				return View::make('website_user.themes10.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('backgrounds',$backgrounds)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;

			case 11:
				return View::make('website_user.themes11.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;

			case 12:
				return View::make('website_user.themes12.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;
			case 13:
				return View::make('website_user.themes13.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;
			case 14:
				return View::make('website_user.themes14.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('backgrounds',$backgrounds)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;
			case 15:
				return View::make('website_user.themes15.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('backgrounds',$backgrounds)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;	
			case 16:
				return View::make('website_user.themes16.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;	

			case 17:
				return View::make('website_user.themes17.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('backgrounds',$backgrounds)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;

			case 18:
				return View::make('website_user.themes18.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('backgrounds',$backgrounds)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);;
				break;

			case 19:
				return View::make('website_user.themes19.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('backgrounds',$backgrounds)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;

			case 20:
				return View::make('website_user.themes20.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('backgrounds',$backgrounds)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;

			case 21:
				return View::make('website_user.themes21.page.index')->with('website', $website)
																->with('firstname', $firstname)
																->with('id_web', $id_website)
																->with('date_url',$date_url)
																->with('email',$email)
																->with('backgrounds',$backgrounds)
																->with('count_down_url',$count_down_url)
																->with('url', $url)
																->with('web_fb',$website_tamp->background);
				break;
			default:
				return View::make('website_user.themes.page.index')->with('website', $website)
																	->with('firstname', $firstname)
																	->with('id_web', $id_website)
																	->with('backgrounds',$backgrounds)
																	->with('date_url',$date_url)
																	->with('url', $url)
																	->with('web_fb',$website_tamp->background);
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

	// get images avatar Bride and Groom
	public static function avatarBrideGroom($id)
	{
		$id_user = WebsiteController::id_user();

		switch ($id) {
			case 111:
				return WeddingWebsite::where('user', $id_user)->get()->first()->avatar_bride;
				break;
			
			default:
				return WeddingWebsite::where('user', $id_user)->get()->first()->avatar_groom;
				break;
		}
	}


	// update infor about groom and bride in header
	public function update_infor(){
		$name_groom = Input::get('name_groom');
		$name_bride = Input::get('name_bride');
		$about_groom = Input::get('about_groom');
		$about_bride = Input::get('about_bride');
		$id_user = WebsiteController::id_user();
		if (empty($name_groom)) {
			$name_groom = "Tên Chú Rể";
		}
		if (empty($name_bride)) {
			$name_bride = "Tên Cô Dâu";
		}
		if (empty($about_groom)) {
			$about_groom = "Thông tin về chú rể";
		}
		if (empty($about_bride)) {
			$about_bride = "Thông tin về cô dâu";
		}
		WeddingWebsite::where('user',$id_user)->update(
			array('name_groom'=>$name_groom,'name_bride'=>$name_bride,
				'about_groom'=>$about_groom,'about_bride'=>$about_bride));
		echo json_encode(array('message_infor'=>'Cập nhật thông tin thành công'));
		exit();
		
	}
	// update infor bride and groom in edit

	public function loadInforBride(){
		$id_user = $this->id_user();
		$web = $this->getWeb();
		$name_bride = $web->name_bride;
		$about_bride = $web->about_bride;
		return Response::json(array('name_bride'=>$name_bride,'about_bride'=>$about_bride));
	
	}
	public function updateInforBride(){
		$id_user = $this->id_user();
		$name_bride = Input::get('name_bride');
		$about_bride = Input::get('about_bride');
		WeddingWebsite::where('user',$id_user)->update(array('name_bride'=>$name_bride,'about_bride'=>$about_bride));
		return Response::json(array('name_bride'=>$name_bride,'about_bride'=>$about_bride));
	}

	public function loadInforGroom(){
		$id_user = $this->id_user();
		$web = $this->getWeb();
		$name_groom = $web->name_groom;
		$about_groom = $web->about_groom;
		return Response::json(array('name_groom'=>$name_groom,'about_groom'=>$about_groom));
	
	}
	public function updateInforGroom(){
		$id_user = $this->id_user();
		$name_groom = Input::get('name_groom');
		$about_groom = Input::get('about_groom');
		WeddingWebsite::where('user',$id_user)->update(array('name_groom'=>$name_groom,'about_groom'=>$about_groom));
		return Response::json(array('name_groom'=>$name_groom,'about_groom'=>$about_groom));
	}
	// end  update infor bride and groom in edit


	// cut string
	public static function cutName($input){
		return substr($input, 0, 1);
	}

	public function uploadPhoto(){
		$file = Input::file('file');
		$id_user=WebsiteController::id_user();
	 	 if(Input::hasFile('file')){
			$phototab=new PhotoTab();
			$years=date("Y");
			$months=date('m');	
			File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);
		  	$filename =str_random(10) . '.' .$file->getClientOriginalExtension();
			$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
			$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
			Image::make($file->getRealPath())->resize(800, 600)->save($path);
			$phototab->user=$id_user;
			$phototab->photo=$pathsave;
			$phototab->save();   	
   		 }
	}

	function loadMyAlbum(){
		$id_user	=	WebsiteController::id_user();
		$images 	=	PhotoTab::where('user',$id_user)->get();		
		return View::make('website_user.my_album')->with('images', $images);
	}

	/**
	*count data to dashboard
	*
	*/ 
	public static function arrayCheckData()
	{
		$website 			= new WeddingWebsite();
		return $arWeb 		= $website->where('user', WebsiteController::id_user())->get();
	}

	public static function getCountDataNull()
	{
		$arRequest 	= WebsiteController::arrayCheckData();

		$count 		= 0;
		foreach ($arRequest[0]['attributes'] as $key => $value) {
			if ( $value!=null ) {
				$count += 1;
			}
		}

		return $count;
	}

	public static function getCountDataPercent()
	{
		$arWeb  = WebsiteController::arrayCheckData();

		if ( count($arWeb)==0 ) {
			$percent = 0;
		} else {
			$check 	= count( $arWeb[0]['attributes'] );

			if ( $check==0 ) {
				$percent = 0;
			} else {
				$percent 	= ( WebsiteController::getCountDataNull()/$check )*100;
				$percent 	= round($percent);
			}
		}

		return $percent;
	}


	/**
	*return data to Dashboard
	*
	*/ 
	public static function getDataDashboard()
	{
		$arData = WeddingWebsite::where('user', WebsiteController::id_user())->get();

		return $arData;
	}

	// upload avatar
	public function uploadWedding(){
		$file = Input::file('file');
		$id_user = $this->id_user();
		$check_avatar = Input::get('check-avatar');
		if (Input::hasFile('file')) {
			switch ($check_avatar) {
				case 111:
					$imagesBrideGroom = WebsiteController::avatarBrideGroom(111);
					if (!empty($imagesBrideGroom)) {
						$path_delete=public_path($imagesBrideGroom);
						File::delete($path_delete);
					}
					File::makeDirectory(public_path('images/website/avatar'),$mode = 0775,true,true);
					$filename = $id_user.'_bride_' .str_random(10).'.' .$file->getClientOriginalExtension();
					 $pathsave = 'images/website/avatar/'.$filename;
					$path = public_path('images/website/avatar/'.$filename);
					Image::make($file->getRealPath())->resize(800, 600)->save($path);
					WeddingWebsite::where('user',$id_user)->update(
						array('avatar_bride'=>$pathsave)					
						);
					break;

				case 222: 
					$imagesBrideGroom = WebsiteController::avatarBrideGroom(222);
					if (!empty($imagesBrideGroom)) {
						$path_delete=public_path($imagesBrideGroom);
						File::delete($path_delete);
					}
					File::makeDirectory(public_path('images/website/avatar'),$mode = 0775,true,true);
					$filename = $id_user.'_groom_' .str_random(10).'.' .$file->getClientOriginalExtension();
					$pathsave = 'images/website/avatar/'.$filename;
					$path = public_path('images/website/avatar/'.$filename);
					Image::make($file->getRealPath())->resize(800, 600)->save($path);
					WeddingWebsite::where('user',$id_user)->update(
						array('avatar_groom'=>$pathsave)					
						);
					break;
					}
		}

	}

	public function loadWedding(){
		$id_user = $this->id_user();
		$check_avatar = Input::get('check_avatar'); 
		$photo = WeddingWebsite::where('user',$id_user)->get()->first();
			if ( $check_avatar == 111 ) {				
		 		$image = asset($photo->avatar_bride);
		 		return Response::json(array('image'=>$image));
			} else 
			{
		 		$image = asset($photo->avatar_groom);
		 		return Response::json(array('image'=>$image));
			}

	}

	public function checkURL(){
		$url = Str::slug(Input::get('url'));
		$id_user = $this->id_user();
		$count = WeddingWebsite::where('user','!=',$id_user)->where('url',$url)->get()->count();
		if (!empty($url)) {
			if (!empty($count)) {
				return Response::json(array('msg'=>'URL đã tồn tại, nhập vào URL khác.','color'=>'#C13222'));
			} else {
				return Response::json(array('msg'=>'URL có thể sử dụng.','color'=>'#428bca'));
			}
		}
		else{
			return Response::json(array('msg'=>"URL không được trống",'color'=>'#C13222'));
		}
		
	}

	public function createURL(){
		$url = Str::slug(Input::get('url'));
		$id_user = $this->id_user();
		$count = WeddingWebsite::where('user','!=',$id_user)->where('url',$url)->get()->count();
		if (!empty($url) && empty($count)) {
				WeddingWebsite::where('user',$id_user)->update(array('url'=>$url));
		}
	}

	public function uploadAvatar(){
		$file = Input::file('file');
		$id_user = $this->id_user();
		$check_tab = Input::get('check-tab');
		$check_vc = Input::get('check-vc');
		$id_tab = $check_tab;
		$check_photo = $check_photo = PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->count();
		if (empty($check_tab)) {
			switch ($check_vc) {
				case 111:
					$imagesBrideGroom = WebsiteController::avatarBrideGroom(111);
					if (!empty($imagesBrideGroom)) {
						$path_delete=public_path($imagesBrideGroom);
						File::delete($path_delete);
					}
					File::makeDirectory(public_path('images/website/avatar'),$mode = 0775,true,true);
					$filename = $id_user.'_bride_' .str_random(10).'.' .$file->getClientOriginalExtension();
					 $pathsave = 'images/website/avatar/'.$filename;
					$path = public_path('images/website/avatar/'.$filename);
					Image::make($file->getRealPath())->resize(800, 600)->save($path);
					WeddingWebsite::where('user',$id_user)->update(
						array('avatar_bride'=>$pathsave)					
						);
					break;

				case 222:
					$imagesBrideGroom = WebsiteController::avatarBrideGroom(222);
					if (!empty($imagesBrideGroom)) {
						$path_delete=public_path($imagesBrideGroom);
						File::delete($path_delete);
					}
					File::makeDirectory(public_path('images/website/avatar'),$mode = 0775,true,true);
					$filename = $id_user.'_groom_' .str_random(10).'.' .$file->getClientOriginalExtension();
					$pathsave = 'images/website/avatar/'.$filename;
					$path = public_path('images/website/avatar/'.$filename);
					Image::make($file->getRealPath())->resize(800, 600)->save($path);
					WeddingWebsite::where('user',$id_user)->update(
						array('avatar_groom'=>$pathsave)					
						);
					break;
			}
			
		} else {
			if ( $check_photo  > 0 ) {
				$name = PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->first()->photo;
				$years = date("Y");
				$months = date('m');
				$path_delete = public_path($name);
				File::delete($path_delete);
				File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);
				$filename = str_random(10) . '.' .$file->getClientOriginalExtension();
				$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
				$pathsave='images/website/'.$years.'/'.$months.'/'.$filename;
				Image::make($file->getRealPath())->resize(800, 600)->save($path);
				PhotoTab::where('user',$id_user)->where('tab',$id_tab)->update(
					array('photo'=>$pathsave)					
					);
				} 
			else {
				$phototab = new PhotoTab();
				$years = date("Y");
				$months = date('m');	
				File::makeDirectory(public_path('images/website/'.$years.'/'.$months),$mode = 0775,true,true);
			  	$filename =str_random(10) . '.' .$file->getClientOriginalExtension();
				$path = public_path('images/website/'.$years.'/'.$months.'/'.$filename);
				$pathsave = 'images/website/'.$years.'/'.$months.'/'.$filename;
				Image::make($file->getRealPath())->resize(800, 600)->save($path);
				$phototab->user = $id_user;
				$phototab->photo = $pathsave;
				$phototab->tab = $id_tab;
				$phototab->save();
				}	
		}
		
	}

	// load avatar
	public function loadAvatar(){
		$id_user = $this->id_user();
		$check_tab = Input::get('check_tab');
		$check_vc = Input::get('check_vc');
		$id_tab = $check_tab;
		if ( empty($check_tab) ) {
			$photo = WeddingWebsite::where('user',$id_user)->get()->first();
			if ( $check_vc == 111 ) {				
		 		$image = asset($photo->avatar_bride);
		 		return Response::json(array('image'=>$image));
			} else {
		 		$image = asset($photo->avatar_groom);
		 		return Response::json(array('image'=>$image));
			}
			
			
		} else {
			$photo = PhotoTab::where('user',$id_user)->where('tab',$id_tab)->get()->first();
			$image = asset($photo->photo);
			return Response::json(array('image'=>$image));
		}
	}



} // end Controller






