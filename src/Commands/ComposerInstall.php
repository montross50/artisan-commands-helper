<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class ComposerInstall extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install {options?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Composer installs in the php workspace container';

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
        $container = config('ach.php_container');
        $cmd = $this->dockerCompose . ' exec ' . $container . ' ' . $this->composer . ' install '.$options;
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
