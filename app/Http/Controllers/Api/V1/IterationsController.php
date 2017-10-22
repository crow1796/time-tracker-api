<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Iteration;

class IterationsController extends Controller
{
	public function index($teamId, $projectId){
		return [
			'iterations' => Iteration::where('project_id', $projectId)
                                    ->orderBy('started_at', 'desc')
									->limit(5)
									->get(),
		];
	}
    
    public function create($teamId, $projectId, Request $reqeust){
    	$iteration = new Iteration;
    	$iteration->project_id = $projectId;
    	$iteration->started_at = \Carbon\Carbon::now();
    	$iteration->ended_at = \Carbon\Carbon::now()->addDays(7);
    	$iteration->save();

    	return [
    		'iteration' => $iteration,
    		'iterations' => Iteration::where('project_id', $projectId)
                                    ->orderBy('started_at', 'desc')
                                    ->limit(5)
                                    ->get(),
    	];
    }
}
