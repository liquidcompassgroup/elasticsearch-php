<?php

namespace ElasticsearchLegacy\Endpoints\Cluster\Settings;

use ElasticsearchLegacy\Common\Exceptions;
use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints\Cluster\Settings
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Put extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @throws \ElasticsearchLegacy\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        $uri = "/_cluster/settings";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'flat_settings',
            'master_timeout',
            'timeout',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';
    }
}
