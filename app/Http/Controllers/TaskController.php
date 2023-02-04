<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Developer;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::query()->orderBy('difficulty')->get();

        $distribution = [];

        foreach ($tasks as $task) {
            $task_weight = $task->difficulty * $task->time_as_hour;

            $developer = Developer::query()->where('hourly_difficulty', $task->difficulty)->first();

            $estimated_time = $task_weight / $developer->hourly_difficulty;
            $distribution[] = [
                'task' => $task->name,
                'developer' => $developer->name,
                'estimated_time' => $estimated_time
            ];
        }
        $distribution = collect($distribution);
        $group_by_dev = $distribution->groupBy('developer');
        $weeks_by_devs = [];
        foreach ($group_by_dev as $dev) {
            $week = 1;
            $week_time = 0;
            foreach ($dev as $task_item) {
                $week_time = $task_item['estimated_time'] + $week_time;
                if ($week_time > 45) {
                    $week = $week + 1;
                    $week_time = 0;
                }
                $weeks_by_devs[$task_item['developer']][$week][] = $task_item;
            }
        }

        return view('tasks.distribution', compact('weeks_by_devs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
