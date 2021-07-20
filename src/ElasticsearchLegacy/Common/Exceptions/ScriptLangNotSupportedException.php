<?php

namespace ElasticsearchLegacy\Common\Exceptions;

/**
 * ScriptLangNotSupportedException
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Common\Exceptions
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ScriptLangNotSupportedException extends BadRequest400Exception implements ElasticsearchException
{
}
