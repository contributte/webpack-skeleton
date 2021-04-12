<?php declare(strict_types = 1);

use Nette\Bootstrap\Configurator;

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Configurator();

$configurator->setDebugMode(getenv('NETTE_DEBUG') === '1');
$configurator->enableTracy(__DIR__ . '/../var/log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../var/tmp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');

return $configurator->createContainer();
