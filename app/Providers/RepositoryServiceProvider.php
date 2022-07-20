<?php

namespace App\Providers;

use App\Interfaces\Repositories\HistoryRepositoryInterface;
use App\Interfaces\Repositories\TaskRepositoryInterface;
use App\Repositories\MySql\MySqlHistoryRepository;
use App\Repositories\MySql\MySqlTaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HistoryRepositoryInterface::class, MySqlHistoryRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, MySqlTaskRepository::class);
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
