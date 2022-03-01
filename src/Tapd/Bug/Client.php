<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Tapd\Bug;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use OaTapdApi\Kernel\BaseClient;
use OaTapdApi\Kernel\Exceptions\InvalidConfigException;
use Psr\Http\Message\ResponseInterface;

class Client extends BaseClient
{
    protected $prefixUri = 'bugs';

    /**
     * 缺陷列表.
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

        if (isset($params['reporter'])) {
            $query['reporter'] = $params['reporter'];
        }

        if (isset($params['title'])) {
            $query['title'] = $params['title'];
        }

        if (isset($params['de'])) {
            $query['de'] = $params['de'];
        }

        if (isset($params['te'])) {
            $query['te'] = $params['te'];
        }

        if (isset($params['current_owner'])) {
            $query['current_owner'] = $params['current_owner'];
        }

        if (isset($params['status'])) {
            $query['status'] = $params['status'];
        }

        if (isset($params['resolution'])) {
            $query['resolution'] = $params['resolution'];
        }

        if (isset($params['priority'])) {
            $query['priority'] = $params['priority'];
        }

        if (isset($params['severity'])) {
            $query['severity'] = $params['severity'];
        }

        if (isset($params['module'])) {
            $query['module'] = $params['module'];
        }

        if (isset($params['created'])) {
            $query['created'] = $params['created'];
        }

        if (isset($params['version_report'])) {
            $query['version_report'] = $params['version_report'];
        }

        if (isset($params['version_test'])) {
            $query['version_test'] = $params['version_test'];
        }

        if (isset($params['testtype'])) {
            $query['testtype'] = $params['testtype'];
        }

        if (isset($params['originphase'])) {
            $query['originphase'] = $params['originphase'];
        }

        if (isset($params['source'])) {
            $query['source'] = $params['source'];
        }

        if (isset($params['sourcephase'])) {
            $query['sourcephase'] = $params['sourcephase'];
        }

        if (isset($params['iteration_id'])) {
            $query['iteration_id'] = $params['iteration_id'];
        }

        if (isset($params['fields'])) {
            $query['fields'] = $params['fields'];
        }

        return $this->httpGet($this->prefixUri.'.json', $query);
    }

    /**
     * 创建缺陷.
     *
     * @param $workspaceId
     * @param $title
     * @param $reporter
     * @param array $params
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function create($workspaceId, $title, $reporter, $params = [])
    {
        $query = [
            'workspace_id' => $workspaceId,
            'title' => $title,
            'reporter' => $reporter,
        ];

        foreach ($params as $key => $value) {
            $query[$key] = $value;
        }

        return $this->httpPost($this->prefixUri.'.json', $query);
    }

    /**
     * 更新缺陷.
     *
     * @param $id
     * @param $workspaceId
     * @param $currentUser
     * @param array $params
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function update($id, $workspaceId, $currentUser, $params = [])
    {
        $query = [
            'id' => $id,
            'workspace_id' => $workspaceId,
            'current_user' => $currentUser,
        ];

        if (isset($params['title'])) {
            $query['title'] = $params['title'];
        }

        if (isset($params['reporter'])) {
            $query['reporter'] = $params['reporter'];
        }

        if (isset($params['description'])) {
            $query['description'] = $params['description'];
        }

        if (isset($params['de'])) {
            $query['de'] = $params['de'];
        }

        if (isset($params['te'])) {
            $query['te'] = $params['te'];
        }

        if (isset($params['current_owner'])) {
            $query['current_owner'] = $params['current_owner'];
        }

        if (isset($params['status'])) {
            $query['status'] = $params['status'];
        }

        if (isset($params['resolution'])) {
            $query['resolution'] = $params['resolution'];
        }

        if (isset($params['priority'])) {
            $query['priority'] = $params['priority'];
        }

        if (isset($params['severity'])) {
            $query['severity'] = $params['severity'];
        }

        if (isset($params['module'])) {
            $query['module'] = $params['module'];
        }

        if (isset($params['version_report'])) {
            $query['version_report'] = $params['version_report'];
        }

        if (isset($params['version_test'])) {
            $query['version_test'] = $params['version_test'];
        }

        if (isset($params['testtype'])) {
            $query['testtype'] = $params['testtype'];
        }

        if (isset($params['originphase'])) {
            $query['originphase'] = $params['originphase'];
        }

        if (isset($params['source'])) {
            $query['source'] = $params['source'];
        }

        if (isset($params['sourcephase'])) {
            $query['sourcephase'] = $params['sourcephase'];
        }

        return $this->httpPost($this->prefixUri.'/'.$id.'.json', $query);
    }

    /**
     * 获取自定义字段值
     *
     * @param $workspaceId
     * @param $fields
     * @param int $limit
     * @param int $page
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function getCustomFields($workspaceId, $fields, $limit = 30, $page = 1)
    {
        $query = [
            'workspace_id' => $workspaceId,
            'limit' => $limit,
            'page' => $page,
            'fields' => $fields,
        ];

        return $this->httpGet($this->prefixUri.'/custom_fields_setting.json', $query);
    }

    /**
     * 获取系统字段值
     *
     * @param $workspaceId
     * @param $type
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function getSystemFields($workspaceId, $type)
    {
        return $this->httpGet($this->prefixUri.'/system_fields.json', [
            'type' => $type,
            'workspace_id' => $workspaceId,
        ]);
    }

    /**
     * 项目默认bug模版必填字段.
     *
     * @param $workspaceId
     *
     * @return array|Collection|object|ResponseInterface|string
     *
     * @throws GuzzleException
     * @throws InvalidConfigException
     *
     * @author caikeal <caikeal@qq.com>
     */
    public function getDefaultTemplate($workspaceId)
    {
        return $this->httpGet($this->prefixUri.'/get_default_bug_template', ['workspace_id' => $workspaceId]);
    }
}
