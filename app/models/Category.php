<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
 
class Category extends Eloquent implements SluggableInterface
{
 
    use SluggableTrait;
 
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );
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
	public function userbudget()
	{
		return $this->hasMany('UserBudget','category');
	}

}