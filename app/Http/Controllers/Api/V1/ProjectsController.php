<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Project;

class ProjectsController extends Controller
{
    
	public function create($teamId, Request $request){
		$project = Project::create([
				'team_id' => $teamId,
				'title' => $request->title,
			]);
		return [
			'status' => $project ? true : false,
			'project' => $project->toArray(),
		];
	}

}
