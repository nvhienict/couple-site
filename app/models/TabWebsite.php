<?php

class TabWebsite extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tabwebsite';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	function phototab()
	{
		return $this->hasMany("PhotoTab",'tab');
	}

}