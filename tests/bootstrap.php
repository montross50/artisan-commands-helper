<?php namespace Tests;

use Montross50\ArtisanCommandsHelper\ArtisanCommandsHelperServiceProvider;
use Orchestra\Testbench\TestCase;

/**
 * This is just for local testing if you are so inclined
 * Class TestApp
 *
 * @package Tests
 */
class TestApp extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ArtisanCommandsHelperServiceProvider::class];
    }

    protected function setUp()
    {
        putenv('ACH_DOCKER_PATH=/bin/echo');
        putenv('ACH_DOCKER_COMPOSE_PATH=/bin/echo');
        parent::setUp();
    }
}

$t = new TestApp();
return $t->createApplication();
