<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerStop extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stops the containers with docker compose';

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
        $cmd = $this->dockerCompose . ' stop';
        $this->info('Running: '.$cmd);
        $this->line(shell_exec($cmd));
    }
}
