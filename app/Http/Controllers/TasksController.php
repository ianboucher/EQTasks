<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = Task::all();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $userId)
    {
        $user = User::find($userId);
        $task = $user->tasks()->create(['description' => $request->input('description')]);
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($taskId)
    {
        return Task::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $userId, $taskId)
    {
        $task = Task::find($taskId);
        $task->description = $request->input('description');
        $task->completed   = $request->input('completed');
        $task->save();

        return [$userId, $taskId];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $task = Task::find($id);
        $task->delete();

        return 'Task: '. $task->name . ' successfully deleted';
    }
}
