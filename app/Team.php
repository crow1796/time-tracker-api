<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Team extends Model
{
	use Sluggable;
    protected $table ='teams';

    public function projects(){
    	return $this->hasMany('App\Project', 'team_id', 'id');
    }

    public function sluggable(){
    	return [
    		'slug' => [
    			'source' => 'name',
    		],
    	];
    }
}
