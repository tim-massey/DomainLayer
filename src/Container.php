<?php

namespace RedMarker;

use Psr\Container\ContainerInterface;
use DI;

class Container
{

    static $container;

    public static function factory(Config $config)
    {
        if (self::$container) {
            return self::$container;
        }
        $builder = new DI\ContainerBuilder();
        $builder->useAutowiring(false);
        $builder->useAnnotations(false);
        $builder->enableCompilation('/tmp');
        $builder->addDefinitions([
            'config' => function () use ($config) {
                return $config;
            },
            'db.artemis.rw' => function (ContainerInterface $c) {
                $db = new \StdClass;
                $db->container = $c;
                return $db;
            },
            'repository.content' => function (ContainerInterface $c) {
                return new Repository\Content\Repository([
                    'artemis' => new Repository\Content\Strategy\DefaultStrategy(),
                    'minerva' => new Repository\Content\Strategy\DefaultStrategy(),
                    'document_processor' => new Repository\Content\Strategy\DefaultStrategy(),
                ]);
            },
        ]);
        $container = $builder->build();
        self::$container = $container;
        return self::$container;
    }
}