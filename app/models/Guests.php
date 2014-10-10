<?php

class Guests extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'guests';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function groups()
	{
		return $this->hasOne("Groups","groups");
	}

}