<?php

namespace App\Providers;

use App\Support\AnimalInterface;
use App\Support\CatHome;
use App\Support\DogHome;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AnimalInterface::class, CatHome::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        Validator::excludeUnvalidatedArrayKeys();
    }
}
