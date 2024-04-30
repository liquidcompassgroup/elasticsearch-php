<?php

namespace ElasticsearchLegacy\Tests\ConnectionPool\Selectors;

use Elasticsearch;
use ElasticsearchLegacy\ConnectionPool\Selectors\StickyRoundRobinSelector;
use Mockery as m;

/**
 * Class StickyRoundRobinSelectorTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests\ConnectionPool\StickyRoundRobinSelectorTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class StickyRoundRobinSelectorTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testTenConnections()
    {
        $roundRobin = new StickyRoundRobinSelector();

        $mockConnections = array();
        $mockConnections[] = m::mock('\ElasticsearchLegacy\Connections\GuzzleConnection')
                             ->shouldReceive('isAlive')->times(16)->andReturn(true)->getMock();

        foreach (range(0, 9) as $index) {
            $mockConnections[] = m::mock('\ElasticsearchLegacy\Connections\GuzzleConnection');
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $this->assertEquals($mockConnections[0], $retConnection);
        }
    }

    public function testTenConnectionsFirstDies()
    {
        $roundRobin = new StickyRoundRobinSelector();

        $mockConnections = array();
        $mockConnections[] = m::mock('\ElasticsearchLegacy\Connections\GuzzleConnection')
                             ->shouldReceive('isAlive')->once()->andReturn(false)->getMock();

        $mockConnections[] = m::mock('\ElasticsearchLegacy\Connections\GuzzleConnection')
                             ->shouldReceive('isAlive')->times(15)->andReturn(true)->getMock();

        foreach (range(0, 8) as $index) {
            $mockConnections[] = m::mock('\ElasticsearchLegacy\Connections\GuzzleConnection');
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $this->assertEquals($mockConnections[1], $retConnection);
        }
    }
}
