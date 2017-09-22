<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Iteration;

class TeamsController extends Controller
{

    public function index(){
    	dd(\Auth::user());
		$teams = \DB::table('team_user')
					->selectRaw('teams.id, teams.name, teams.slug')
					->join('teams', 'team_user.team_id', '=', 'teams.id')
					->join('users', 'team_user.user_id', '=', 'users.id')
					->get();
		$iterations = Iteration::orderBy('started_at', 'desc')
								->limit(5)
								->get();
		return [
			'teams' => $teams,
			'iterations' => $iterations,
		];
	}

	public function teamProjects($teamId){
		$projects = Team::find($teamId)->projects;
		return [
			'projects' => $projects,
		];
	}

}
