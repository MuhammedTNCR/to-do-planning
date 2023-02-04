<?php

namespace App\Repositories;

use App\Interfaces\TaskApiInterface;
use App\Models\Task;
use Illuminate\Support\Facades\Http;

class Api1Repository implements TaskApiInterface
{
    protected string $endpoint = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';
    public function getTasks()
    {
        $tasks = Http::get($this->endpoint);
        return $tasks->json();
    }

    public function saveTasks(array $tasks)
    {
        foreach ($tasks as $task) {
            $task_data = Task::where('name', $task['id'])->first();
            if (!$task_data) {
                Task::create([
                    'name' => $task['id'],
                    'time_as_hour' => $task['sure'],
                    'difficulty' => $task['zorluk']
                ]);
            }
        }
    }
}
