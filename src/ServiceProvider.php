<?php

declare(strict_types=1);
/**
 * This file is part of szwtdl/simple-icloud
 * @link     https://www.szwtdl.cn
 * @contact  szpengjian@gmail.com
 * @license  https://github.com/szwtdl/simple-icloud/blob/master/LICENSE
 */
namespace SimpleIcloud;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->setupConfig();
        $this->app->singleton(Application::class, function () {
            $options = config('icloud');
            return new Application($options);
        });
        $this->app->alias(Application::class, 'icloud');
    }

    public function provides()
    {
        return [Application::class, 'icloud'];
    }

    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/icloud.php');
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => \config_path('icloud.php')], 'icloud');
        }
        $this->mergeConfigFrom($source, 'icloud');
    }
}
