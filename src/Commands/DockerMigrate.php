<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerMigrate extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate {option?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate the database';

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
        $sub = $this->argument('option');
        $container = config('ach.php_container');
        $sub = $sub != "" ? ":$sub" : "" ;
        $cmd = $this->dockerCompose . ' exec ' . $container . ' php artisan migrate'.$sub;
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
