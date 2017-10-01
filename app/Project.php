<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
	use Sluggable;
    protected $table = 'projects';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'team_id',
        'title',
        'slug',
        'created_at',
        'updated_at',
    ];

	public function sluggable(){
    	return [
    		'slug' => [
    			'source' => 'title',
    		]
    	];
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function iterations(){
        return $this->hasMany('App\Iteration');
    }

    public function tasks(){
        return $this->belongsTo('App\Task', 'project_task', 'project_id', 'task_id')
                    ->withTimestamps();
    }
}
