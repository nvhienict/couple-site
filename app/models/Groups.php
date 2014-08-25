<?php

class Groups extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function guests()
	{
		return $this->belongsTo("Guests","guests");
	}

}