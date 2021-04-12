<?php declare(strict_types = 1);

namespace App;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\Routing\Router;

class RouterFactory
{

	public static function createRouter(): Router
	{
		$router = new RouteList();
		$router[] = new Route('<presenter>/<action>', 'Homepage:default');

		return $router;
	}

}
