<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $dates = [
    	'created_at',
    	'updated_at',
    ];
    
    public function projects(){
    	return $this->belongsToMany('App\Project', 'project_task', 'task_id', 'project_id')
    				->withTimestamps();
    }
}
