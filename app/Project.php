<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
	use Sluggable;
    protected $table = 'projects';
    protected $fillable = [
        'team_id',
        'title',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function team(){
    	return $this->belongsTo('App\Team');
    }

	public function sluggable(){
    	return [
    		'slug' => [
    			'source' => 'title',
    		]
    	];
    }
}
