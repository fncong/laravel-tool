<?php

namespace Tool;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Routing\Controller;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Tool\Commands\ControllerCommand;
use Tool\Commands\InitCommand;
use Tool\Commands\MakeCommand;
use Tool\Commands\ServiceCommand;
use Tool\Commands\TestCommand;
use Tool\Commands\ValidatorCommand;

class ToolProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $adapter = new Local(app_path());
            $file_system = new Filesystem($adapter);
            $file_system->createDir('Enums');
            $file_system->createDir('Http/Validators');
            $file_system->createDir('Http/Services/Api');
            $file_system->createDir('Http/Services/Web');
            $file_system->createDir('Http/Services/Admin');

            $this->registerMigrations();

            $this->publishes([
                __DIR__ . '/../database' => database_path(''),
            ], 'tool-migrations');

            $this->publishes([
                __DIR__ . '/../Enums' => app_path('Enums'),
            ], 'tool-enums');

            $this->publishes([
                __DIR__ . '/../Models' => app_path('Models'),
            ], 'tool-models');

            $this->publishes([
                __DIR__ . '/../Services' => app_path('Http/Services'),
            ], 'tool-services');

            $this->commands([
                MakeCommand::class,
                ControllerCommand::class,
                ServiceCommand::class,
                ValidatorCommand::class,
            ]);
        }
    }

    public function registerMigrations()
    {
        if (Sanctum::shouldRunMigrations()) {
            return $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }
}
