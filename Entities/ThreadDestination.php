<?php

namespace Modules\PrivateMessage\Entities;

use Illuminate\Database\Eloquent\Model;

class ThreadDestination extends Model
{
	public $timestamps = false;
	protected $table = 'privatemessage__thread_destinations';
	protected $fillable = [];

	public function thread()
	{
		return $this->belongsTo('Modules\PrivateMessage\Entities\Thread');
	}

	public function receivers()
	{
		return $this->hasMany('Modules\User\Entities\Sentry\User', 'receiver_id');
	}

	public function receiversGroup()
	{
		return $this->hasMany('Cartalyst\Sentry\Groups\Eloquent\Group', 'receivers_id');
	}
}
