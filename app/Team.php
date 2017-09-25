<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Team extends Model
{
	use Sluggable;
    protected $table ='teams';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function sluggable(){
    	return [
    		'slug' => [
    			'source' => 'name',
    		],
    	];
    }

    public function projects(){
        return $this->hasMany('App\Project', 'team_id', 'id');
    }
    
    public function members(){
        return $this->belongsToMany('App\User', 'team_user', 'team_id', 'user_id');
    }
}
