<?php

namespace ElasticsearchLegacy\Endpoints\Cat;

use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class Health
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Plugins extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $uri = "/_cat/plugins";

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
