<?php

namespace ElasticsearchLegacy\ConnectionPool\Selectors;

use ElasticsearchLegacy\Connections\ConnectionInterface;

/**
 * Class RoundRobinSelector
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\ConnectionPool\Selectors\ConnectionPool
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class RoundRobinSelector implements SelectorInterface
{
    /**
     * @var int
     */
    private $current = 0;

    /**
     * Select the next connection in the sequence
     *
     * @param  ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \ElasticsearchLegacy\Connections\ConnectionInterface
     */
    public function select($connections)
    {
        $this->current += 1;

        return $connections[$this->current % count($connections)];
    }
}
