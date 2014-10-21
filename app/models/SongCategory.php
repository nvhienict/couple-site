<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
 
class SongCategory extends Eloquent implements SluggableInterface
{
 
    use SluggableTrait;
 
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );




	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'song_categories';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function song()
	{
		return $this->hasMany('Song','category');
	}

}

