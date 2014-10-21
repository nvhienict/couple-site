<?php
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
 
class Song extends Eloquent implements SluggableInterface
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
	protected $table = 'songs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function category()
	{
		return $this->belongsTo('SongCategory','category');
	}

	public function song_comment(){
		return $this->hasMany("SongComment","comment");
	}

}
