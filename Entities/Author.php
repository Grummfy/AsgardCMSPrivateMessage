<?php

namespace Modules\PrivateMessage\Entities;

use Modules\User\Entities\UserInterface;

class Author extends AbstractModelWrapper implements \WebInterface\Models\Common\Author
{
	public function __construct(UserInterface $model)
	{
		parent::__construct($model);
	}

	public function getDisplayableName()
	{
		return $this->_model->first_name . ' ' . $this->_model->last_name;
	}
}
