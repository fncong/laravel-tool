<?php

namespace Tool;

use Illuminate\Support\ServiceProvider;
use Tool\Commands\TestCommand;

class ToolProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TestCommand::class
            ]);
        }
    }
}