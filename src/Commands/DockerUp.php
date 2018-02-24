<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerUp extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'up {options?*} {--d=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Spins up the containers with docker compose';

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
        if ($this->option('d') == 'true') {
            $arguments[] = "-d";
        }
        $options = implode(" ", $arguments);
        $cmd = $this->dockerCompose . ' up '.$options;
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
