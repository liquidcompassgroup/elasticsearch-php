<?php

namespace ElasticsearchLegacy\Endpoints;

use ElasticsearchLegacy\Common\Exceptions;
use ElasticsearchLegacy\Serializers\SerializerInterface;
use ElasticsearchLegacy\Transport;

/**
 * Class MSearch
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class MSearch extends AbstractEndpoint
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param Transport $transport
     * @param SerializerInterface $serializer
     */
    public function __construct(Transport $transport, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        parent::__construct($transport);
    }

    /**
     * @param array|string $body
     *
     * @throws \ElasticsearchLegacy\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        if (is_array($body) === true) {
            $bulkBody = "";
            foreach ($body as $item) {
                $bulkBody .= $this->serializer->serialize($item) . "\n";
            }
            $body = $bulkBody;
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
        $type = $this->type;
        $uri = "/_msearch";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_msearch";
        } elseif (isset($index) === true) {
            $uri = "/$index/_msearch";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_msearch";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'search_type',
        ];
    }

    /**
     * @return array
     * @throws \ElasticsearchLegacy\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for MSearch');
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
