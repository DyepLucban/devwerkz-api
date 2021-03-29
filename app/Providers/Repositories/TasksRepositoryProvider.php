<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Models\Task;
use App\Repositories\TaskRepository;

class TasksRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskRepository::class, function() {
            return new TaskRepository(new Task);
        });
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
