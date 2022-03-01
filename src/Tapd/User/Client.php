<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\User;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use OaTapdApi\Kernel\BaseClient;
use OaTapdApi\Kernel\Exceptions\InvalidConfigException;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    protected $prefixUri = 'users';

    /**
     * 用户参与的项目.
     *
     * @param $username
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function workspaces($username)
    {
        return $this->httpGet($this->prefixUri.'/all_workspaces.json', [
            'user' => $username,
        ]);
    }

    /**
     * 用户列表.
     *
     * @param $workspaceId
     * @param array $params
     * @param int   $limit
     * @param int   $page
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function users($workspaceId, $params = [], $limit = 30, $page = 1)
    {
        $query = [
            'workspace_id' => $workspaceId,
            'limit' => $limit,
            'page' => $page,
        ];

        if (isset($params['id'])) {
            $query['id'] = $params['id'];
        }

        if (isset($params['username'])) {
            $query['user'] = $params['username'];
        }

        if (isset($params['fields'])) {
            $query['fields'] = $params['fields'];
        }

        return $this->httpGet($this->prefixUri.'.json', $query);
    }
}
