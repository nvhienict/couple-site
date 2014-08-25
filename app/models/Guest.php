<?php

class Guest extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'guest';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function group()
	{
		return $this->hasOne("Group","group");
	}

}