<?php

namespace App\Console\Commands;

use App\Repositories\Api1Repository;
use App\Repositories\Api2Repository;
use Illuminate\Console\Command;

class SaveTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save tasks from providers';

    protected array $taskRepositories = [
        Api1Repository::class,
        Api2Repository::class,
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Fetching tasks');
        foreach ($this->taskRepositories as $repositoryClass) {
            $taskRepository = app()->make($repositoryClass);
            $tasks = $taskRepository->getTasks();
            $taskRepository->saveTasks($tasks);
        }
        //save tasks
        $this->info('all tasks are saved.');
    }
}
