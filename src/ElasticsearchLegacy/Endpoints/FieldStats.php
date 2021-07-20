<?php

namespace ElasticsearchLegacy\Endpoints;

use ElasticsearchLegacy\Common\Exceptions;

/**
 * Class FieldStats
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class FieldStats extends AbstractEndpoint
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
        $uri = "/_field_stats";

        if (isset($index) === true) {
            $uri = "/$index/_field_stats";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'fields',
            'level',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
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
