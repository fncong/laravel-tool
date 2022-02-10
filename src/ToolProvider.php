<?php

namespace Tool;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Routing\Controller;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\Filesystem;
use Tool\Commands\ControllerCommand;
use Tool\Commands\EnumCommand;
use Tool\Commands\MakeCommand;
use Tool\Commands\ServiceCommand;
use Tool\Commands\ValidatorCommand;

class ToolProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $adapter = new LocalFilesystemAdapter(app_path());
            $file_system = new Filesystem($adapter);
            $file_system->createDirectory('Enums');
            $file_system->createDirectory('Http/Validators');
            $file_system->createDirectory('Http/Services/Api');
            $file_system->createDirectory('Http/Services/Web');
            $file_system->createDirectory('Http/Services/Admin');

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
                EnumCommand::class,
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
