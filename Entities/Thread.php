<?php

namespace Modules\PrivateMessage\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use WebInterface\Models\Common\Collection;
use WebInterface\Models\Common\Thread as ThreadInterface;

class Thread extends Model implements ThreadInterface
{
    protected $table = 'privatemessage__threads';
    protected $fillable = [];

	public function messages()
	{
		return $this->hasMany('Modules\PrivateMessage\Entities\Message');
	}

	public function destinations()
	{
		return $this->hasMany('Modules\PrivateMessage\Entities\ThreadDestination');
	}

	public function receivers()
	{
		$userDriver = config('asgard.user.users.driver');
		return $this->hasManyThrough('Modules\\User\\Entities\\' . $userDriver . '\\User', 'Modules\PrivateMessage\Entities\ThreadDestination', 'receiver_id', 'id');
	}

	public function receiversGroup()
	{
		return $this->hasManyThrough('Cartalyst\Sentry\Groups\Eloquent\Group', 'Modules\PrivateMessage\Entities\ThreadDestination', 'receivers_id', 'id');
	}

	/**
	 * @return array|Collection
	 */
	public function getMetaData()
	{
		return [
			'created_at'    => $this->created_at,
			'updated_at'    => $this->updated_at,
		];
	}

	/**
	 * @return Collection<Message>
	 */
	public function getMessages()
	{
		return $this->messages;
	}

	/**
	 * @return string
	 */
	public function getTopic()
	{
		return $this->topic;
	}
}
