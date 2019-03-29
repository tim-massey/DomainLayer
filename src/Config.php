<?php

namespace RedMarker;

class Config
{
    static $config;

    public static function factory()
    {
        return new self();
    }
}