<?php

class SongController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($slug)
	{
		//
		$id=SongCategory::where('slug',$slug)->get()->first()->id;
		$cats = SongCategory::where('id', $id)->get();
		$songs = Song::where('category', $id)->get();

		return View::make('song.index')->with('cats', $cats)
										->with('songs', $songs);
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


	// play songs
	public function play($slug,$slug_song)
	{
		if(!Session::has('email')){
			$firstname="";
			$lastname="";
			$user_name = $firstname.' '.$lastname;
			$user_avatar="";
		}else{
			$id_user = User::where('email',Session::get('email'))->get()->first()->id;

			$firstname = User::where('id',$id_user)->get()->first()->firstname;
			$lastname = User::where('id',$id_user)->get()->first()->lastname;
			$user_name = $firstname.' '.$lastname;
			$user_avatar = User::where('id',$id_user)->get()->first()->avatar;
		}
		$id_song=Song::where('slug',$slug_song)->get()->first()->id;
		$songs = Song::where('id', $id_song)->get();
		return View::make('song.play_song')->with('songs', $songs)
											->with('user_name', $user_name)
											->with('user_avatar', $user_avatar);
	}

	// return lyric of a song
	public static function lyric($str)
	{
		return $str = str_replace('.','<br>',$str);
	}

	// comment for song
	public function post_comment($id_song)
	{
		$id_user = Input::get('id_user');
		$cmt = Input::get('cmt');

		$firstname = User::where('id',$id_user)->get()->first()->firstname;
		$lastname = User::where('id',$id_user)->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		// insert comment to table song_comment

		$song_comment = new SongComment();
		$song_comment->user=$id_user;
		$song_comment->user_name=$user_name;
		$song_comment->song=$id_song;
		$song_comment->content=$cmt;
		$song_comment->save();

		// get avatar user
		$user_avatar = User::where('id',$id_user)->get()->first()->avatar;
		$avatar = base64_decode($user_avatar);

		// get data for show 
		$arComment = SongComment::get()->last();

		$html = '';
		$html .="<div class='song_comment'>
					<div class='song_avatar'>
						<img src=".$avatar.">
					</div>
					<div class='song_content'>
						<span style='color: #428bca;''>".$arComment->user_name."</span> nói rằng:<br />
						
						".$arComment->content."
					</div>
				</div>
				<div id='your_cmt'></div>";
		echo $html;

	}


}
