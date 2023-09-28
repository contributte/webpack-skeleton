<?php declare(strict_types = 1);

namespace App;

use Contributte\Bootstrap\ExtraConfigurator;
use Contributte\Nella\Boot\Bootloader;
use Contributte\Nella\Boot\Preset\NellaPreset;
use Nette\Application\Application;

final class Bootstrap
{

	public static function boot(): ExtraConfigurator
	{
		return Bootloader::create()
			->use(NellaPreset::create(__DIR__))
			->boot();
	}

	public static function run(): void
	{
		self::boot()
			->createContainer()
			->getByType(Application::class)
			->run();
	}

}
