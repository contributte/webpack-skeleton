<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application\UI\Form;
use Nette\Utils\DateTime;
use Nette\Utils\Validators;

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

	protected function createComponentUserForm(): Form
	{
		$form = new Form();

		$form->addText('username', 'Username');

		$form->addText('age', 'Your age?');

		$form->addSubmit('send', 'OK');

		$form->onValidate[] = function (Form $form) {
			if (!Validators::isNumeric($form->values->age)) {
				$form->addError(sprintf('Invalid age input "%s" given', $form->values->age));
			}

			if ($form->hasErrors()) {
				$this->redrawControl('userFormOk'); // for cleanup
				$this->redrawControl('userFormError');
			}
		};

		$form->onSuccess[] = function () {
			$this->redrawControl('userFormError'); // for cleanup
			$this->redrawControl('userFormOk');
		};

		return $form;
	}

}
