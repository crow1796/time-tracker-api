<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

	public function index($teamId, $projectId, $iteration, Request $request){
        
        $iteration = \App\Iteration::find($iteration);
        $tasks = $iteration->tasks()
                            ->offset(($request->limit * $request->page) - $request->limit)
                            ->limit($request->limit)
                            ->get();
        $total = $iteration->tasks()
                            ->count();

        return response()->json([
            'tasks' => $tasks,
            'total' => $total,
        ]);        
	}

    public function create($teamId, $projectId, $iteration, Request $request){
        $task = \App\Task::create([
            'iteration_id' => $iteration,
            'title' => null,
            'description' => null,
            'status' => null,
        ]);

        return response()->json([
            'task' => $task,
        ]);
    }
    
    public function update($teamId, $projectId, $iteration, Request $request){
        $task = \App\Task::find($request->id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'task' => $task,
        ]);
    }

}
