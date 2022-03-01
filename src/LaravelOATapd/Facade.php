<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\LaravelOATapd;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    /**
     * 默认为 Server.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'oa.tapd';
    }

    /**
     * @return \OaTapdApi\Tapd\Application
     */
    public static function tapd($appKey, $appSecret)
    {
        $oaTapd = app('oa.tapd');

        return $oaTapd->init($appKey, $appSecret);
    }
}
