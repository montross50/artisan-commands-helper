<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

use Illuminate\Console\Command;

abstract class BaseCommand extends Command
{
    protected $docker;
    protected $dockerCompose;
    protected $composer;

    public function __construct()
    {
        $this->signature = config('ach.namespace') . ':' . $this->signature;
        $this->docker = config('ach.docker_path');
        $this->dockerCompose = config('ach.docker_compose_path');
        $this->composer = config('ach.composer_path');
        parent::__construct();
    }

    /**
     * @param $cmd
     *
     * @return string
     */
    protected function runCommand($cmd)
    {
        return shell_exec($cmd);
    }
}
