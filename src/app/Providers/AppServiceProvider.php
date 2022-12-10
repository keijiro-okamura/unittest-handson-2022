<?php

namespace App\Providers;

use App\Modules\HoroscopesApi;
use App\Modules\HoroscopesBeta;
use App\Modules\HoroscopesInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         // $this->app->singleton(HoroscopesInterface::class, HoroscopesApi::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
