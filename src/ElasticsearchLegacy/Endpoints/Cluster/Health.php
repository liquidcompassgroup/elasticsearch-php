<?php

namespace ElasticsearchLegacy\Endpoints\Cluster;

use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class Health
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints\Cluster
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Health extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_cluster/health";

        if (isset($index) === true) {
            $uri = "/_cluster/health/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'level',
            'local',
            'master_timeout',
            'timeout',
            'wait_for_active_shards',
            'wait_for_nodes',
            'wait_for_relocating_shards',
            'wait_for_status',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
