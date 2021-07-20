<?php

namespace ElasticsearchLegacy\Endpoints;

use ElasticsearchLegacy\Common\Exceptions;

/**
 * Class Suggest
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Suggest extends AbstractEndpoint
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
        $index = $this->index;
        $uri = "/_suggest";

        if (isset($index) === true) {
            $uri = "/$index/_suggest";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'preference',
            'routing',
            'source',
        ];
    }

    /**
     * @return array
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Suggest');
        }

        return $this->body;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
