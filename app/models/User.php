<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	public function taskuser()
	{
		return $this->hasOne('UserTask','user');
	}

	public function user_task(){
		return $this->hasMany("UserTask","user");
	}

	public function song_comment(){
		return $this->hasMany("SongComment","user");
	}
	public function rating()
  	{
  		return $this->hasMany('Rating','rating');
  	}
  	public function phototab()
  	{
  		return $this->hasMany("Phototab","phototab");
  	}

} // end class User
