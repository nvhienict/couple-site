<?php

class SongController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		//
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

	// get id_song
	public function get_id_song()
	{
		Session::put('get_song', Input::get('id_song'));
	}

	// play songs
	public function play($id)
	{
		$songs = Song::where('id', $id)->get();
		return View::make('song.play_song')->with('songs', $songs);
	}

	// comment for song
	public function post_comment($id_song)
	{
		$id_user = Input::get('id_user');
		$cmt = Input::get('cmt');

		$firstname = User::where('id',$id_user)->get()->first()->firstname;
		$lastname = User::where('id',$id_user)->get()->first()->lastname;
		$user_name = $firstname.' '.$lastname;

		$id_cmt_last = SongComment::get()->last()->id;

		// insert comment to table song_comment

		$song_comment = new SongComment();
		$song_comment->user=$id_user;
		$song_comment->user_name=$user_name;
		$song_comment->song=$id_song;
		$song_comment->content=$cmt;
		$song_comment->save();

		// get data for show 
		$arComment = SongComment::get()->last();

		
		$html = '';
		$html .="<div id='display_song_comment' class='song_comment_container'>
					<div class='title_comment'><i class='fa fa-user'></i> <span style='color: #428bca;'>".$arComment->user_name."</span> đã nói rằng:</div>
					<div class='content_comment'>
						".$arComment->content."
					</div>
				</div>";
		echo json_encode(array('html'=>$html));
		exit();

	}


}
