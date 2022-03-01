<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\Baseline;

use OaTapdApi\Kernel\BaseClient;

class Client extends BaseClient
{
    protected $prefixUri = 'baselines';

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

        if (isset($params['fields'])) {
            $query['fields'] = $params['fields'];
        }

        return $this->httpGet($this->prefixUri.'.json', $query);
    }
}
