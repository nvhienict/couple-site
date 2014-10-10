<?php

use Carbon\Carbon;

class PhotoTab extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'phototab';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function user()
	{
		return $this->belongTo('User','user');
	}

	// public function tab()
	// {
	// 	return $this->belongTo('Tab','tab');
	// }
	public function TabWebsite()
	{
		return $this->belongTo('TabWebsite','tab');
	}

	

}