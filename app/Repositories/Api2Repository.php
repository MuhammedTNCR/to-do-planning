<?php

namespace App\Repositories;

use App\Interfaces\TaskApiInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Http;

class Api2Repository implements TaskApiInterface
{
    protected string $endpoint = 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7';
    public function getTasks()
    {
        $tasks = Http::get($this->endpoint);
        return $tasks->json();
    }

    public function saveTasks(array $tasks)
    {
        foreach ($tasks as $task) {
            foreach ($task as $task_name => $properties){
                $task_data = Task::where('name', $task_name)->first();
                if (!$task_data) {
                    Task::create([
                        'name' => $task_name,
                        'time_as_hour' => $properties['estimated_duration'],
                        'difficulty' => $properties['level']
                    ]);
                }
            }
        }
    }
}
