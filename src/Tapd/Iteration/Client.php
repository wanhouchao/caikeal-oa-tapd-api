<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\Iteration;

use OaTapdApi\Kernel\BaseClient;

class Client extends BaseClient
{
    protected $prefixUri = 'iterations';

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

        if (isset($params['name'])) {
            $query['name'] = $params['name'];
        }

        if (isset($params['startdate'])) {
            $query['startdate'] = $params['startdate'];
        }

        if (isset($params['enddate'])) {
            $query['enddate'] = $params['enddate'];
        }

        if (isset($params['creator'])) {
            $query['creator'] = $params['creator'];
        }

        if (isset($params['created'])) {
            $query['created'] = $params['created'];
        }

        if (isset($params['modified'])) {
            $query['modified'] = $params['modified'];
        }

        if (isset($params['completed'])) {
            $query['completed'] = $params['completed'];
        }

        if (isset($params['fields'])) {
            $query['fields'] = $params['fields'];
        }

        return $this->httpGet($this->prefixUri.'.json', $query);
    }
}
