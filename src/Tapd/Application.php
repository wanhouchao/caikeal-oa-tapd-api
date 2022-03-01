<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd;

use OaTapdApi\Kernel\Config;
use OaTapdApi\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \OaTapdApi\Tapd\Auth\Client      $auth
 * @property \OaTapdApi\Tapd\Bug\Client       $bug
 * @property \OaTapdApi\Tapd\User\Client      $user
 * @property \OaTapdApi\Tapd\Version\Client   $version
 * @property \OaTapdApi\Tapd\Module\Client    $module
 * @property \OaTapdApi\Tapd\Iteration\Client $iteration
 * @property \OaTapdApi\Tapd\Baseline\Client  $baseline
 * @property \OaTapdApi\Tapd\Release\Client   $release
 * @property \OaTapdApi\Tapd\Workflow\Client  $workflow
 * @property \OaTapdApi\Tapd\Workspace\Client $workspace
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        Bug\ServiceProvider::class,
        User\ServiceProvider::class,
        Version\ServiceProvider::class,
        Module\ServiceProvider::class,
        Iteration\ServiceProvider::class,
        Baseline\ServiceProvider::class,
        Release\ServiceProvider::class,
        Workflow\ServiceProvider::class,
        Workspace\ServiceProvider::class,
    ];

    public function init($appKey, $appSecret): Application
    {
        $this->defaultConfig = [
            'auth' => [
                'app_key' => $appKey,
                'app_secret' => $appSecret,
            ],
        ];

        $this->rebind('config', new Config($this->getConfig()));

        return $this;
    }
}
