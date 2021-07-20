<?php

namespace ElasticsearchLegacy\Namespaces;

use ElasticsearchLegacy\Transport;

/**
 * Class AbstractNamespace
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Namespaces
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
abstract class AbstractNamespace
{
    /** @var \ElasticsearchLegacy\Transport */
    protected $transport;

    /** @var  callback */
    protected $endpoints;

    /**
     * Abstract constructor
     *
     * @param Transport $transport Transport object
     * @param $endpoints
     */
    public function __construct($transport, $endpoints)
    {
        $this->transport = $transport;
        $this->endpoints = $endpoints;
    }

    /**
     * @param array $params
     * @param string $arg
     *
     * @return null|mixed
     */
    public function extractArgument(&$params, $arg)
    {
        if (is_object($params) === true) {
            $params = (array)$params;
        }

        if (isset($params[$arg]) === true) {
            $val = $params[$arg];
            unset($params[$arg]);

            return $val;
        } else {
            return null;
        }
    }
}
