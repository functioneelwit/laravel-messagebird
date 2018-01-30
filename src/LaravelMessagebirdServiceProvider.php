<?php

namespace FunctioneelWit\LaravelMessageBird;

use Illuminate\Support\ServiceProvider;

class LaravelMessagebirdServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
        \App::bind('messagebird', function () {
            return new MessageBird;
        });
    }
}