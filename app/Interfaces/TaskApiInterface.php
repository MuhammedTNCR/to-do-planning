<?php

namespace App\Interfaces;

interface TaskApiInterface
{
    public function getTasks();
    public function saveTasks(array $tasks);
}
