<?php

namespace ElasticsearchLegacy\ConnectionPool\Selectors;

use ElasticsearchLegacy\Connections\ConnectionInterface;

/**
 * Class RandomSelector
 *
 * @category Elasticsearch
 * @package  ElasticsearchLegacy\Connections\Selectors\RandomSelector
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class RandomSelector implements SelectorInterface
{
    /**
     * Select a random connection from the provided array
     *
     * @param  ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \ElasticsearchLegacy\Connections\ConnectionInterface
     */
    public function select($connections)
    {
        return $connections[array_rand($connections)];
    }
}
