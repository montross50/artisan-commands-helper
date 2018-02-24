<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerBuild extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build {options?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Builds the containers with docker compose';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arguments = $this->argument('options');
        $options = implode(" ", $arguments);
        $cmd = $this->dockerCompose . ' build '.$options;
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
