<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a collection of the resource.
     *
     * @param  int  $userId
     * @return Response
     */
    public function index($userId)
    {
        $user = User::find($userId);
        $tasks = $user->tasks()->get();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request
     * @param  int  $userId
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
     * @param  int  $userId
     * @param  int  $taskId
     * @return Response
     */
    public function show($userId, $taskId)
    {
        return Task::find($taskId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request
     * @param  int  $userId
     * @param  int  $taskId
     * @return Response
     */
    public function update(Request $request, $userId, $taskId)
    {
        $task = Task::find($taskId);
        $task->description = $request->input('description');
        $task->completed   = $request->input('completed');
        $task->save();

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $userId
     * @param  int  $taskId
     * @return Response
     */
    public function destroy($userId, $taskId)
    {
        $task = Task::find($taskId);
        $task->delete();

        return 'Task: '. $task->name . ' successfully deleted';
    }
}
