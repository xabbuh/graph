<?php

namespace Fhaculty\Graph\Builder;

use Fhaculty\Graph\Builder\Base as BuilderBase;

class ArrayEdge extends BuilderBase
{
    private $directed = false;

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
