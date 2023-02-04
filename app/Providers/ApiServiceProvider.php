<?php

namespace App\Providers;

use App\Interfaces\TaskApiInterface;
use App\Repositories\Api1Repository;
use App\Repositories\Api2Repository;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskApiInterface::class, Api1Repository::class);
        $this->app->bind(TaskApiInterface::class, Api2Repository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
