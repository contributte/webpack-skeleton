<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application\BadRequestException;
use Nette\Application\Request;

class Error4xxPresenter extends BasePresenter
{

	public function startup()
	{
		parent::startup();
		if (!$this->getRequest()->isMethod(Request::FORWARD)) {
			$this->error();
		}
	}

	public function renderDefault(BadRequestException $exception)
	{
		// load template 403.latte or 404.latte or ... 4xx.latte
		$file = __DIR__ . sprintf('/templates/Error/%s.latte', $exception->getCode());
		$file = is_file($file) ? $file : __DIR__ . '/templates/Error/4xx.latte';
		$this->template->setFile($file);
	}

}
