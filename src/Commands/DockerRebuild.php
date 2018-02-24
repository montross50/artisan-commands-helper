<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerRebuild extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rebuild';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Spins up the containers with docker compose and rebuild them';

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
        $cmd = $this->dockerCompose . ' up -d --build';
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
