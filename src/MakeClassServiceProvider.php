<?php

namespace Hisman\MakeClass;

use Illuminate\Support\ServiceProvider;
use Hisman\MakeClass\Console\MakeClassCommand;

class MakeClassServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeClassCommand::class]);
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
