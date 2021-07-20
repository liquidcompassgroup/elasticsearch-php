<?php

namespace ElasticsearchLegacy\Endpoints\Indices\Template;

use ElasticsearchLegacy\Common\Exceptions;
use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints\Indices\Template
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Put extends AbstractEndpoint
{
    // The name of the template
    private $name;

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
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for Put'
            );
        }
        $name = $this->name;
        $uri = "/_template/$name";

        if (isset($name) === true) {
            $uri = "/_template/$name";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'order',
            'create',
            'timeout',
            'master_timeout',
            'flat_settings',
        ];
    }

    /**
     * @return array
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Put Template');
        }

        return $this->body;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';
    }
}
