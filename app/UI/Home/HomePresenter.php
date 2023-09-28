<?php declare(strict_types = 1);

namespace App\UI\Home;

use App\UI\BasePresenter;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Nette\Utils\DateTime;
use Nette\Utils\Html;
use Nette\Utils\Strings;

class HomePresenter extends BasePresenter
{

	public function renderDefault(): void
	{
		$this->template->datetime = new DateTime();
	}

	public function handleReload(string $box): void
	{
		$this->redrawControl($box);
	}

	public function handleReloadAll(): void
	{
		$this->redrawControl('box1');
		$this->redrawControl('box2');
		$this->redrawControl('box3');
	}

	protected function createComponentUserForm(): Form
	{
		$form = new Form();

		$form->addText('username', 'Username')
			->setRequired('Username is mandatory')
			->setHtmlAttribute('placeholder', 'Type your name Mr.?');

		$form->addText('email', 'Email')
			->setHtmlAttribute('placeholder', 'Type your e-mail')
			->setOption('description', Html::el('span')->setHtml('Try to type <strong>cool@nette.org</strong> to see validation.'))
			->setEmptyValue('@')
			->addFilter(fn ($email) => Strings::lower($email))
			->addRule($form::REQUIRED, 'E-mail is mandatory')
			->addRule($form::EMAIL, 'Given e-mail is not e-mail');

		$form->addInteger('age', 'Your age?')
			->setHtmlAttribute('Are you young?')
			->setNullable();

		$form->addSubmit('send', 'OK');

		$form->onValidate[] = function (Form $form): void {
			$values = $form->getUnsafeValues(ArrayHash::class);

			// Validate e-mail duplicities (against DB?)
			if (str_ends_with($values->email, '@nette.org')) {
				$form->addError(sprintf('E-mail "%s" is already picked', $values->email));
			}
		};

		$form->onSubmit[] = function (): void {
			// This method in invoked always
			$this->redrawControl('userFormError');
			$this->redrawControl('userFormOk');
		};

		$form->onSuccess[] = function (): void {
			// Some handling on success...
		};

		return $form;
	}

}
