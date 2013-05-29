<?php

namespace Fhaculty\Graph;

class SimpleBuilder
{
    private $graph;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function addEdges(array $edges)
    {
        $edges = array();
        foreach ($edges as $from => $to) {
            $from = $this->graph->createVertex($from, true);
            $to   = $this->graph->createVertex($to,   true);

            $edges []= $from->createEdge($to);
        }
        return $edges;
    }
}
