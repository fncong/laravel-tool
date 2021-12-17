<?php

namespace Tool\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class MakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:make {model} {--api=} {--admin=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成基础文件';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->argument('model');
        $options = $args = $this->options();
        var_dump($model);
        var_dump($options);
        $this->getStub();
        return 0;
    }

    public function getStub()
    {
        $stub = null;
        
        $api = $this->option('api') && is_null($stub);
        $admin = $this->option('admin');
        var_dump($api );
    }
}
