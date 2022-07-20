<?php

namespace App\Providers;

use App\Interfaces\Repositories\HistoryRepositoryInterface;
use App\Repositories\MySql\MySqlHistoryRepository;
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
