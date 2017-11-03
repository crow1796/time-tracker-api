<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Iteration;
use Validator;

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
    
    public function create($teamId, $projectId, Request $request){
		$validation = $this->validateIteration($request->all());

		if($validation->fails()){
			return ['error' => $validation->errors()->all()];
		}
		
    	$iteration = new Iteration;
		$iteration->project_id = $projectId;
		$iteration->name = $request->name;
    	$iteration->started_at = \Carbon\Carbon::parse($request->period[0]);
    	$iteration->ended_at = \Carbon\Carbon::parse($request->period[1]);
    	$iteration->save();

    	return [
    		'iteration' => $iteration,
    		'iterations' => Iteration::where('project_id', $projectId)
                                    ->orderBy('started_at', 'desc')
                                    ->limit(5)
                                    ->get(),
    	];
	}

	private function validateIteration($iteration){
		return Validator::make($iteration, [
			'name' => 'required|string',
			'period.*' => 'required',
		], [
			'name.required' => 'Name is required.',
			'period.0.required' => 'Period Starting date is required.',
			'period.1.required' => 'Period Ending date is required.',
		]);
	}
	
}
