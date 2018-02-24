<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerRun extends DockerUp
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run {options?*} {--d=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Spins up the containers with docker compose (alias for up)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
}
