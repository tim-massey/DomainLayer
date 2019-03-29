<?php

namespace RedMarker\Repository\Content;

class Repository
{
    protected $strategies = [];

    public function __construct(array $strategies)
    {
        foreach ($strategies as $name => $strategy) {
            $this->setStrategy($name, $strategy);
        }
    }

    protected function setStrategy($name, $strategy)
    {
        $this->strategies[$name] = $strategy;
    }

    protected function getStrategy($name)
    {

    }

    public function findBy($criteria)
    {
        return new \RedMarker\DomainModel\ResultSet();
    }
}