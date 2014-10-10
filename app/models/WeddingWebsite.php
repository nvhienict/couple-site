<?php

use Carbon\Carbon;

class WeddingWebsite extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weddingwebsite';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function user()
	{
		return $this->belongsTo('User','user');
	}

	public function template()
	{
		return $this->belongsTo('WeddingTemplate','template');
	}
	

}