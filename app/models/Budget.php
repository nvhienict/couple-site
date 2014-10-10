<?php

class Budget extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'budget';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function category()
	{
		return $this->belongsTo("Category","categoty");
	}

}