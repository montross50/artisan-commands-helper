<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerSeed extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed your database';

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
        $container = config('ach.php_container');
        $cmd = $this->dockerCompose . ' exec ' . $container . ' php artisan migrate db:seed';
        $this->info('Running: '.$cmd);
        $this->line(shell_exec($cmd));
    }
}
