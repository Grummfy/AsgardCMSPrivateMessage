<?php

namespace Modules\PrivateMessage\Entities;

use Illuminate\Database\Eloquent\Model;

class AbstractModelWrapper
{
	/**
	 * @var Model
	 */
	protected $_model;

	public function __construct(Model $model)
	{
		$this->_model = $model;
	}

	public function __call($method, $args)
	{
		if (method_exists($this->_model, $method))
		{
			return call_user_func([$this->_model, $method], $args);
		}
		return false;
	}
} 
