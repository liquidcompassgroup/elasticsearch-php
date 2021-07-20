<?php

namespace ElasticsearchLegacy\Endpoints;

use ElasticsearchLegacy\Common\Exceptions;

/**
 * Class Render
 *
 * @category Elasticsearch
 * @package ElasticsearchLegacy\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class RenderSearchTemplate extends AbstractEndpoint
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
        $id = $this->id;

        $uri = "/_render/template";

        if (isset($id) === true) {
            $uri = "/_render/template/$id";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return array
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
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
