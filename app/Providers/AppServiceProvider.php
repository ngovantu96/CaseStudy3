<?php

namespace App\Providers;

use App\Http\Repo\CategoryRepo\CategoryRepository;
use App\Http\Repo\CategoryRepo\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\DatabaseManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
