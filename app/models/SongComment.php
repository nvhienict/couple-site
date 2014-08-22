<?php

class SongComment extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'song_comments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function user()
	{
		return $this->belongsTo('User','user');
	}

	public function song()
	{
		return $this->belongsTo('Song','song');
	}

}
