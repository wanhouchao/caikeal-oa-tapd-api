<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\Auth;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use OaTapdApi\Kernel\BaseClient;
use OaTapdApi\Kernel\Exceptions\InvalidConfigException;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    protected $prefixUri = 'authentications.json';

    /**
     * 检查用户身份.
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     */
    public function check()
    {
        return $this->httpGet($this->prefixUri);
    }
}
