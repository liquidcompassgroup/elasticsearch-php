<?php

namespace ElasticsearchLegacy\Endpoints\Cat;

use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class NodeAttrs
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class NodeAttrs extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $uri = "/_cat/nodeattrs";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
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
