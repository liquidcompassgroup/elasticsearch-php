<?php
/**
 * User: zach
 * Date: 01/12/2015
 * Time: 14:34:49 pm
 */

namespace ElasticsearchLegacy\Endpoints\Cat;

use ElasticsearchLegacy\Common\Exceptions;
use ElasticsearchLegacy\Endpoints\AbstractEndpoint;

/**
 * Class Segments
 *
 * @category Elasticsearch
 * @package ElasticsearchLegacy\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Segments extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_cat/segments";

        if (isset($index) === true) {
            $uri = "/_cat/segments/$index";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'h',
            'help',
            'v',
        ];
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
