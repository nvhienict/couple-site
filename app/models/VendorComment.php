<?php

class VendorComment extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vendor_comments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function user()
	{
		return $this->belongsTo('User','user');
	}

	public function vendor()
	{
		return $this->belongsTo('Vendor','vendor');
	}

}
