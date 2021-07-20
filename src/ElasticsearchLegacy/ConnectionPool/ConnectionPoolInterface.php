<?php

namespace ElasticsearchLegacy\ConnectionPool;

use ElasticsearchLegacy\Connections\ConnectionInterface;

/**
 * ConnectionPoolInterface
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\ConnectionPool
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
interface ConnectionPoolInterface
{
    /**
     * @param bool $force
     *
     * @return ConnectionInterface
     */
    public function nextConnection($force = false);

    /**
     * @return void
     */
    public function scheduleCheck();
}
