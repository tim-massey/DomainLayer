<?php

namespace RedMarker\Repository\Content\Strategy;

class DefaultStrategy
{
    public function findBy(array $criteria)
    {
        throw new \Exception('Please implement '.__METHOD__);
    }
}