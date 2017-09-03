<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table ='teams';

    public function projects(){
    	return $this->hasMany('App\Project', 'team_id', 'id');
    }
}
