<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Iteration;

class TeamsController extends Controller
{

    public function index(){
		$user = \Auth::user();
		$teams = $user->teams;
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

	public function create(Request $request){
		$team = Team::create([
			'name' => $request->name,
		]);

		\Auth::user()->teams()->attach($team);

		return [
			'team' => $team,
		];
	}

}
