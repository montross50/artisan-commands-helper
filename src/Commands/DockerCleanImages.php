<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

class DockerCleanImages extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes dangling images with docker';

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
        $cmd = $this->docker . ' rmi `' . $this->docker . ' images -q -f "dangling=true"`';
        $this->info('Running: '.$cmd);
        $this->line($this->runCommand($cmd));
    }
}
