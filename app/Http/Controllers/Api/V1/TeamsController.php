<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Iteration;

class TeamsController extends Controller
{

    public function index(){
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
		$team = Team::find($teamId);
		$projects = $team ? $team->projects : [];
		return [
			'projects' => $projects,
		];
	}

	public function store(Request $request){
		$team = Team::create([
			'name' => $request->name,
		]);

		return [
			'team' => $team,
		];
	}

}
