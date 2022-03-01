<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\Workspace;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use OaTapdApi\Kernel\BaseClient;
use OaTapdApi\Kernel\Exceptions\InvalidConfigException;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    protected $prefixUri = 'workspaces.json';

    /**
     * 项目列表.
     *
     * @param $id
     * @param null $name
     * @param null $prettyName
     * @param null $status
     * @param null $description
     * @param int  $limit
     * @param int  $page
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function list($id, $name = null, $prettyName = null, $status = null, $description = null, $limit = 30, $page = 1)
    {
        return $this->httpGet($this->prefixUri, [
            'id' => $id,
            'name' => $name,
            'pretty_name' => $prettyName,
            'status' => $status,
            'description' => $description,
            'limit' => $limit,
            'page' => $page,
        ]);
    }
}
