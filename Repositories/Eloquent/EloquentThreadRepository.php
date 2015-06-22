<?php namespace Modules\PrivateMessage\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Modules\PrivateMessage\Entities\Inbox;
use Modules\PrivateMessage\Entities\Message;
use Modules\PrivateMessage\Repositories\ThreadRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentThreadRepository extends EloquentBaseRepository implements ThreadRepository
{
	public function listForUser($userId, $inbox, $limit = 25)
	{
		return $this->model
			->where('inbox', $inbox)
			->where('creator_id', $userId)
			->orwhereHas('destinations', function($q) use ($userId)
			{
				$q->where('receiver_id', $userId);
			})
			// todo this smells bad, change to something better
			->orWhereHas('receiversGroup.users', function($q) use ($userId)
			{
				$q->where('user_id', $userId);
			})
			->orderBy('created_at', 'desc')
			->simplePaginate($limit);
	}

	public function find($threadId)
	{
		return $this->model->with(['receivers', 'receiversGroup'])->find($threadId);
	}
}
