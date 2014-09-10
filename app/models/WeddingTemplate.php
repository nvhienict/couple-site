<?php

class WeddingTemplate extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'templates';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function website()
	{
		return $this->hasMany('WeddingWebsite','templates');
	}

}