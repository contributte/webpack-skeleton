<?php declare(strict_types = 1);

namespace Tests\Cases\E2E;

use App\Bootstrap;
use Contributte\Utils\FileSystem;
use Nette\Application\Application as WebApplication;
use Nette\DI\Container;
use Tester\Assert;
use Tester\TestCase;
use Tests\Toolkit\Tests;

require_once __DIR__ . '/../../bootstrap.php';

final class EntrypointTest extends TestCase
{

	public function setUp(): void
	{
		parent::setUp();

		if (!file_exists(Tests::ROOT_PATH . '/config/local.neon')) {
			FileSystem::copy(
				Tests::ROOT_PATH . '/config/local.neon.example',
				Tests::ROOT_PATH . '/config/local.neon'
			);
		}
	}

	public function testWeb(): void
	{
		$container = Bootstrap::boot()->createContainer();
		$container->getByType(WebApplication::class);

		Assert::type(Container::class, $container);
	}

}

(new EntrypointTest())->run();
