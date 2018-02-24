<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class ComposerDumpAutoload extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Composer dump autoload in the php workspace container';

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
        $cmd = $this->dockerCompose . ' exec ' . $container . ' ' . $this->composer . ' dump-autoload';
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
