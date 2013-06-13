<?php

namespace Fhaculty\Graph\Builder;

use Fhaculty\Graph\Graph;

/**
 * Abstract Builder base class
 */
abstract class Base
{
    /**
     * Graph instance to extend
     *
     * @var Graph
     */
    protected $graph;

    /**
     * instantiate new Builder for given or new Graph
     *
     * @param Graph|null $graph optional Graph instance to extend or create new graph
     */
    public function __construct(Graph $graph = null)
    {
        if ($graph === null) {
            $graph = new Graph();
        }

        $this->graph = $graph;
    }

    /**
     * get Graph instance this Builder extends
     *
     * @return Graph
     */
    public function getGraph()
    {
        return $this->graph;
    }
}
