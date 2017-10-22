<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Project;
use App\Iteration;

class ProjectsController extends Controller
{
    
	public function create($teamId, Request $request){
		$project = Project::create([
				'team_id' => $teamId,
				'title' => $request->title,
			]);

		$iteration = new Iteration;
		$iteration->project_id = $project->id;
		$iteration->started_at = \Carbon\Carbon::now();
		$iteration->ended_at = \Carbon\Carbon::now()->addDays(7);
		$iteration->save();

		return [
			'status' => $project ? true : false,
			'project' => $project->toArray(),
			'iterations' => $project->iterations()->orderBy('started_at')->get()->toArray(),
			'iteration' => $iteration,
		];
	}

}
