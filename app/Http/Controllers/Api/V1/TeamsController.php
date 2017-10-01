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
		return [
			'teams' => $teams,
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

		\Auth::user()->teams()->attach($team);

		return [
			'team' => $team,
		];
	}

}
