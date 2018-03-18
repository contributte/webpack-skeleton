<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Utils\DateTime;

class HomepagePresenter extends BasePresenter
{

	public function renderDefault(): void
	{
		$this->template->datetime = new DateTime();
	}

	public function handleReload(string $box): void
	{
		$this->redrawControl($box);
	}

}
