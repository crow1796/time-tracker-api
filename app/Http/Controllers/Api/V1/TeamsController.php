<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Iteration;

class TeamsController extends Controller
{

    public function index(){
		$teams = Team::all();
		$iterations = Iteration::orderBy('started_at', 'desc')->limit(5)->get();
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
