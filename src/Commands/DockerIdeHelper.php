<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerIdeHelper extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ide-helper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the ide-helper in the php workspace container';

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
        $options = config('ach.ide_helper_models_options');
        $cmd = $this->dockerCompose . ' exec ' . $container . ' php artisan ide-helper:generate';
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));

        $cmd =  $this->dockerCompose . ' exec ' . $container . ' php artisan ide-helper:meta';
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));


        $cmd = $this->dockerCompose . ' exec ' . $container . ' php artisan ide-helper:models '.$options;
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
