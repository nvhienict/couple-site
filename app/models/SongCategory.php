<?php

class SongCategory extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'song_categories';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function song()
	{
		return $this->hasMany('Song','category');
	}

}
