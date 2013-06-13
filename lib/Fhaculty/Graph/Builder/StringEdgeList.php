<?php

namespace Fhaculty\Graph\Builder;

use Fhaculty\Graph\Builder\Base as BuilderBase;
use Fhaculty\Graph\Exception\InvalidArgumentException;

class StringEdgeList extends BuilderBase
{
    public function addEdge($string)
    {
        if (!preg_match('/^(?<start>\w+)\s*(?<edge>\<?\-+\>?)\s*(?<end>\w+)$/', $string, $match)) {
            throw new InvalidArgumentException('Invalid edge string given');
        }
        $endHead = (substr($match['edge'], 0, 1) === '<');
        $endTail = (substr($match['edge'], -1) === '>');

        $start = $this->graph->createVertex($match['start'], true);
        $end   = $this->graph->createVertex($match['end'], true);

        if ($endHead === $endTail) {
            // undirected edge (-- or <-->)
            $start->addEdge($end);
        } else if ($endTail) {
            // forward edge ->
            $start->createEdgeTo($end);
        } else {
            // backward edge <-
            $end->createEdgeTo($start);
        }
    }
}
