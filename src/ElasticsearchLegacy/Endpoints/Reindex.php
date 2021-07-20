<?php

namespace ElasticsearchLegacy\Endpoints;

use ElasticsearchLegacy\Common\Exceptions;

/**
 * Class Reindex
 *
 * @category Elasticsearch
 * @package ElasticsearchLegacy\Endpoints *
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Reindex extends AbstractEndpoint
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

        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body must be an array'
            );
        }
        $this->body = $body;

        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
    {
        $uri = "/_reindex";

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'refresh',
            'timeout',
            'consistency',
            'wait_for_completion',
        ];
    }


    /**
     * @return array
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for POST');
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
