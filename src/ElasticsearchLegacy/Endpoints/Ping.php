<?php

namespace ElasticsearchLegacy\Endpoints;

/**
 * Class Ping
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Ping extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $uri = "/";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'HEAD';
    }
}
