<?php

class Category extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function vendor()
	{
		return $this->belongsTo("Vendor","id");
	}
	public function task()
	{
		return $this->hasMany("Task",'category');

	}
	public function usertask()
	{
		return $this->hasMany('UserTask','category');
	}

}
