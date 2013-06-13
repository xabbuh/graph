<?php

namespace Fhaculty\Graph\Builder;

class ArrayEdge
{
    private $graph;

    private $directed = false;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function setDirected($toggle=true)
    {
        $this->directed = !!$toggle;
        return $this;
    }

    public function addEdges(array $edges)
    {
        $edges = array();
        foreach ($edges as $from => $to) {
            $from = $this->graph->createVertex($from, true);
            $to   = $this->graph->createVertex($to,   true);

            $edges []= ($directed) ? $from->createEdgeTo($to) : $from->createEdge($to);
        }
        return $edges;
    }
}
