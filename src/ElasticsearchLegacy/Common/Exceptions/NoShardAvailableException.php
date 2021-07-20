<?php

namespace ElasticsearchLegacy\Common\Exceptions;

/**
 * NoShardAvailableException
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class NoShardAvailableException extends ServerErrorResponseException implements ElasticsearchException
{
}
