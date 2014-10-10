<?php

class Location extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'location';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function vendor()
	{
		return $this->belongsTo("Vendor","id");
	}

}
