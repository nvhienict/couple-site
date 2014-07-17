<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Vendor extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vendors';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function location()
	{
    	return $this->belongsTo('Location', 'location');
  	}
  	public function category()
  	{
    	return $this->belongsTo('Category', 'category');
  	}
}
