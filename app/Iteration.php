<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iteration extends Model
{
    protected $table = 'iterations';
    protected $dates = [
    	'started_at',
    	'ended_at',
    	'created_at',
    	'updated_at',
    ];

    protected function project(){
    	return $this->belongsTo('App\Project');
    }
}
