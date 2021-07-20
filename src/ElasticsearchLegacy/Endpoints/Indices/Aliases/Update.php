<?php

namespace ElasticsearchLegacy\Endpoints\Indices\Aliases;

use ElasticsearchLegacy\Common\Exceptions;
use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class Update
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints\Indices\Aliases
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Update extends AbstractEndpoint
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
        $uri = "/_aliases";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'timeout',
            'master_timeout',
        ];
    }

    /**
     * @return array
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Update Aliases');
        }

        return $this->body;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}
