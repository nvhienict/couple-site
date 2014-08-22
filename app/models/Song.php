<?php

class Song extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'songs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function category()
	{
		return $this->belongsTo('SongCategory','category');
	}

	public function song_comment(){
		return $this->hasMany("SongComment","comment");
	}

}
