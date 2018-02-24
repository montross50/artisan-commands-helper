<?php

namespace Montross50\ArtisanCommandsHelper\Commands;

use Illuminate\Console\Command;

abstract class BaseCommand extends Command
{
    protected $docker;
    protected $dockerCompose;

    public function __construct()
    {
        $this->signature = config('ach.namespace') . ':' . $this->signature;
        $this->docker = config('ach.docker_path');
        $this->dockerCompose = config('ach.docker_path');
        parent::__construct();
    }
}
