<?php

namespace Olabodeabesin\Nuban;

use Illuminate\Support\ServiceProvider;

class NubanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        $this->app->make('Olabodeabesin\Nuban\NubanController');
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
