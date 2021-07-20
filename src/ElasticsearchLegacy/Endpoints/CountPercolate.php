<?php

namespace ElasticsearchLegacy\Endpoints;

use ElasticsearchLegacy\Common\Exceptions;

/**
 * Class CountPercolate
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class CountPercolate extends AbstractEndpoint
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
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for CountPercolate'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for CountPercolate'
            );
        }

        $index = $this->index;
        $type = $this->type;
        $id = $this->id;
        $uri = "/$index/$type/_percolate/count";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id/_percolate/count";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'routing',
            'preference',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'percolate_index',
            'percolate_type',
            'version',
            'version_type',
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
