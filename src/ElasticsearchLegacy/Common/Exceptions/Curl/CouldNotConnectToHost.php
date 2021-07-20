<?php

namespace ElasticsearchLegacy\Common\Exceptions\Curl;

use ElasticsearchLegacy\Common\Exceptions\ElasticsearchException;
use ElasticsearchLegacy\Common\Exceptions\TransportException;

/**
 * Class CouldNotConnectToHost
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Common\Exceptions\Curl
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class CouldNotConnectToHost extends TransportException implements ElasticsearchException
{
}
