<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\Version;

use OaTapdApi\Kernel\BaseClient;

class Client extends BaseClient
{
    protected $prefixUri = 'versions';

    public function list($workspaceId, $params = [], $limit = 30, $page = 1)
    {
        $query = [
            'workspace_id' => $workspaceId,
            'limit' => $limit,
            'page' => $page,
        ];

        if (isset($params['id'])) {
            $query['id'] = $params['id'];
        }

        if (isset($params['creator'])) {
            $query['creator'] = $params['creator'];
        }

        if (isset($params['name'])) {
            $query['name'] = $params['name'];
        }

        if (isset($params['owner'])) {
            $query['owner'] = $params['owner'];
        }

        if (isset($params['created'])) {
            $query['created'] = $params['created'];
        }

        if (isset($params['testtime'])) {
            $query['testtime'] = $params['testtime'];
        }

        if (isset($params['releasetime'])) {
            $query['releasetime'] = $params['releasetime'];
        }

        if (isset($params['start'])) {
            $query['start'] = $params['start'];
        }

        if (isset($params['due'])) {
            $query['due'] = $params['due'];
        }

        if (isset($params['modifier'])) {
            $query['modifier'] = $params['modifier'];
        }

        if (isset($params['modified_time'])) {
            $query['modified_time'] = $params['modified_time'];
        }

        if (isset($params['fields'])) {
            $query['fields'] = $params['fields'];
        }

        return $this->httpGet($this->prefixUri.'.json', $query);
    }
}
