<?php
use RedMarker\Config;
use RedMarker\Container;

$rootPath = realpath(__FILE__);
$autoloadPath = realpath(dirname(__FILE__).'/../vendor/');
$include = include_once $autoloadPath.'/autoload.php';
$config = Config::factory();
$container = Container::factory($config);

$artemis =  "";

$contentRepository = $container->get('repository.content');
$contentRepository->setStrategy();
$content = $contentRepository->findBy([
    'id' => 1
]);

var_dump($content);
