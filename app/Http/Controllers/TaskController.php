<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Task一蘭
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return Task::orderByDesc('id')->get();
    }

    /**
     * @param StoreTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @
     */

    public function store(StoreTaskRequest $request)
    {


        $task = Task::create($request->all());

        return $task ? response()->json($task, 201) : response()->json([], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $update = [
            "title" => $request->title
        ];

        $task = Task::where("id", $request->id)->update($update);

        return $task ? response()->json($task, 200) : response()->json([], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Task $task)
    {
        return $task->delete() ? response()->json($task) : response()->json([], 500);
    }

    public function updateDone(Task $task, Request $request)
    {
        $task->is_done = $request->is_done;

        return $task->update() ? response()->json($task) : response()->json([], 500);
    }
}
