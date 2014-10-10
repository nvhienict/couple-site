<?php

class Rating extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rating';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
  	public function vendor()
  	{
  		return $this->belongTo('Vendor','vendor');
  	}
  	public function user()
  	{
  		return $this->belongTo('User','user');
  	}
}
