<?php

class UserTask extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usertask';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function category()
	{
		return $this->belongsTo("Category","category");
	}
	public function user()
	{
		return $this->belongsTo('User','user');
	}


}
