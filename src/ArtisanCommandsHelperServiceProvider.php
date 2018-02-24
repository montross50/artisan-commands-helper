<?php

namespace Montross50\ArtisanCommandsHelper;

use Illuminate\Support\ServiceProvider;
use Montross50\ArtisanCommandsHelper\Commands\ComposerDumpAutoload;
use Montross50\ArtisanCommandsHelper\Commands\ComposerInstall;
use Montross50\ArtisanCommandsHelper\Commands\ComposerUpdate;
use Montross50\ArtisanCommandsHelper\Commands\DockerBuild;
use Montross50\ArtisanCommandsHelper\Commands\DockerClean;
use Montross50\ArtisanCommandsHelper\Commands\DockerCleanImages;
use Montross50\ArtisanCommandsHelper\Commands\DockerDown;
use Montross50\ArtisanCommandsHelper\Commands\DockerIdeHelper;
use Montross50\ArtisanCommandsHelper\Commands\DockerMigrate;
use Montross50\ArtisanCommandsHelper\Commands\DockerRebuild;
use Montross50\ArtisanCommandsHelper\Commands\DockerRun;
use Montross50\ArtisanCommandsHelper\Commands\DockerSeed;
use Montross50\ArtisanCommandsHelper\Commands\DockerStop;
use Montross50\ArtisanCommandsHelper\Commands\DockerUp;

class ArtisanCommandsHelperServiceProvider extends ServiceProvider
{
    /**
     * Run service provider boot operations.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $configPath = __DIR__ . '/../config/ach.php';
            if (function_exists('config_path')) {
                $publishPath = config_path('ach.php');
            } else {
                $publishPath = base_path('config/ach.php');
            }
            $this->publishes([$configPath => $publishPath], 'config');

            $this->commands([
                DockerUp::class,
                DockerBuild::class,
                DockerClean::class,
                DockerCleanImages::class,
                DockerIdeHelper::class,
                DockerMigrate::class,
                DockerRebuild::class,
                DockerRun::class,
                DockerSeed::class,
                DockerStop::class,
                ComposerDumpAutoload::class,
                ComposerInstall::class,
                ComposerUpdate::class
            ]);
        }
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/ach.php';
        $this->mergeConfigFrom($configPath, 'ach');
    }
}
