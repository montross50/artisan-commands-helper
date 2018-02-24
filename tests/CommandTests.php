<?php
namespace Tests;

use Symfony\Component\Console\Output\BufferedOutput;

class CommandTests extends TestCase
{

    /** @test */
    public function docker_build_no_options()
    {
        $result = $this->artisan('ach:build');
        $this->assertEquals('Running: /bin/echo build build', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function docker_build_with_options()
    {
        $result = $this->artisan('ach:build', ['options'=>['foo','bar']]);
        $this->assertEquals('Running: /bin/echo build foo bar build foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_clean_no_options()
    {
        $result = $this->artisan('ach:clean');
        $this->assertEquals('Running: /bin/echo rm rm', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function docker_clean_with_options()
    {
        $result = $this->artisan('ach:clean', ['options'=>['foo','bar']]);
        $this->assertEquals('Running: /bin/echo rm foo bar rm foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_clean_images()
    {
        $result = $this->artisan('ach:clean-images');
        $this->assertEquals('Running: /bin/echo rmi `/bin/echo images -q -f "dangling=true"`rmi images -q -f dangling=true', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function docker_ide_helper_base_options()
    {
        $result = $this->artisan('ach:ide-helper');
        $this->assertEquals('Running: /bin/echo exec workspace php artisan ide-helper:generate exec workspace php artisan ide-helper:generate  Running: /bin/echo exec workspace php artisan ide-helper:meta exec workspace php artisan ide-helper:meta  Running: /bin/echo exec workspace php artisan ide-helper:models -n exec workspace php artisan ide-helper:models -n', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_ide_helper_custom_options()
    {
        config(['ach.ide_helper_models_options'=>'-y foo bar']);
        $result = $this->artisan('ach:ide-helper');
        $this->assertEquals('Running: /bin/echo exec workspace php artisan ide-helper:generate exec workspace php artisan ide-helper:generate  Running: /bin/echo exec workspace php artisan ide-helper:meta exec workspace php artisan ide-helper:meta  Running: /bin/echo exec workspace php artisan ide-helper:models -y foo bar exec workspace php artisan ide-helper:models -y foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_migrate_no_options()
    {
        $result = $this->artisan('ach:migrate');
        $this->assertEquals('Running: /bin/echo exec workspace php artisan migrate exec workspace php artisan migrate', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_migrate_with_option()
    {
        $result = $this->artisan('ach:migrate', ['option'=>'rollback']);
        $this->assertEquals('Running: /bin/echo exec workspace php artisan migrate:rollback exec workspace php artisan migrate:rollback', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_rebuild()
    {
        $result = $this->artisan('ach:rebuild');
        $this->assertEquals('Running: /bin/echo up -d --build up -d --build', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_seed()
    {
        $result = $this->artisan('ach:seed');
        $this->assertEquals('Running: /bin/echo exec workspace php artisan migrate db:seed exec workspace php artisan migrate db:seed', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_stop()
    {
        $result = $this->artisan('ach:stop');
        $this->assertEquals('Running: /bin/echo stop stop', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_up_no_options()
    {
        $result = $this->artisan('ach:up');
        $this->assertEquals('Running: /bin/echo up -d up -d', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_up_with_options()
    {
        $result = $this->artisan('ach:up', ['options'=>['foo','bar']]);
        $this->assertEquals('Running: /bin/echo up foo bar -d up foo bar -d', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_up_with_options_and_no_daemon_flag()
    {
        $result = $this->artisan('ach:up', ['options'=>['foo','bar'],'--d'=>'false']);
        $this->assertEquals('Running: /bin/echo up foo bar up foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_up_no_options_and_no_daemon_flag()
    {
        $result = $this->artisan('ach:up', ['--d'=>'false']);
        $this->assertEquals('Running: /bin/echo up up', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function docker_run_no_options()
    {
        $result = $this->artisan('ach:run');
        $this->assertEquals('Running: /bin/echo up -d up -d', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_run_with_options()
    {
        $result = $this->artisan('ach:run', ['options'=>['foo','bar']]);
        $this->assertEquals('Running: /bin/echo up foo bar -d up foo bar -d', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_run_with_options_and_no_daemon_flag()
    {
        $result = $this->artisan('ach:run', ['options'=>['foo','bar'],'--d'=>'false']);
        $this->assertEquals('Running: /bin/echo up foo bar up foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function docker_run_no_options_and_no_daemon_flag()
    {
        $result = $this->artisan('ach:run', ['--d'=>'false']);
        $this->assertEquals('Running: /bin/echo up up', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function composer_dump_autoload()
    {
        $result = $this->artisan('ach:dump');
        $this->assertEquals('Running: /bin/echo exec workspace /bin/echo dump-autoload exec workspace /bin/echo dump-autoload', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function composer_install_no_options()
    {
        $result = $this->artisan('ach:install');
        $this->assertEquals('Running: /bin/echo exec workspace /bin/echo install exec workspace /bin/echo install', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function composer_install_with_options()
    {
        $result = $this->artisan('ach:install', ['options'=>['foo','bar']]);
        $this->assertEquals('Running: /bin/echo exec workspace /bin/echo install foo bar exec workspace /bin/echo install foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /** @test */
    public function composer_update_no_options()
    {
        $result = $this->artisan('ach:update');
        $this->assertEquals('Running: /bin/echo exec workspace /bin/echo update exec workspace /bin/echo update', trim(str_replace("\n", "", $result->fetch())));
    }

    /** @test */
    public function composer_update_with_options()
    {
        $result = $this->artisan('ach:update', ['options'=>['foo','bar']]);
        $this->assertEquals('Running: /bin/echo exec workspace /bin/echo update foo bar exec workspace /bin/echo update foo bar', trim(str_replace("\n", " ", $result->fetch())));
    }

    /**
     * Call artisan command and return output.
     *
     * @param  string  $command
     * @param  array  $parameters
     * @return BufferedOutput
     */
    public function artisan($command, $parameters = [])
    {
        $buffer = new BufferedOutput();
        $this->app[Kernel::class]->call($command, $parameters, $buffer);
        return $buffer;
    }
}
