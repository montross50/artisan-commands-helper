<?php
namespace Tests;

use Montross50\ArtisanCommandsHelper\ArtisanCommandsHelperServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [ArtisanCommandsHelperServiceProvider::class];
    }

    protected function setUp(): void
    {
        putenv('ACH_DOCKER_PATH=/bin/echo');
        putenv('ACH_DOCKER_COMPOSE_PATH=/bin/echo');
        putenv('ACH_COMPOSER_PATH=/bin/echo');
        parent::setUp();
    }


}
