<?php namespace Modules\PrivateMessage\Repositories\Eloquent;

use Modules\PrivateMessage\Entities\Message;
use Modules\PrivateMessage\Repositories\MessageRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentMessageRepository extends EloquentBaseRepository implements MessageRepository
{
	public function findForUser($userId, $threadId, $limit = 25)
	{
		return $this->model
			->with('author')
			->where('thread_id', $threadId)
			->where('user_id', $userId)
			->orderBy('created_at', 'desc')
			->simplePaginate($limit)
			->get();
	}
}
