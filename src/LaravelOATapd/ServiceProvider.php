<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\LaravelOATapd;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use OaTapdApi\Tapd\Application as Tapd;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
        $this->register();
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('oa-tapd.php')], 'laravel-oa-tapd');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('oa-tapd');
        }
        $this->mergeConfigFrom($source, 'oa-tapd');
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->setupConfig();
        $this->app->singleton('oa.tapd', function ($laravelApp) {
            return new Tapd(config('oa-tapd.defaults', []));
        });
        $this->app->alias('oa.tapd', Tapd::class);
    }
}
