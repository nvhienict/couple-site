<?php

class Group extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'group';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function guest()
	{
		return $this->belongsTo("Guest","guest");
	}

}