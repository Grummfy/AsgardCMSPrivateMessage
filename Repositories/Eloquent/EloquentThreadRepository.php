<?php namespace Modules\PrivateMessage\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Modules\PrivateMessage\Entities\Inbox;
use Modules\PrivateMessage\Repositories\ThreadRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentThreadRepository extends EloquentBaseRepository implements ThreadRepository
{
	/**
	 * Return the latest x thread
	 * @param int $amount
	 * @return Collection
	 */
	public function latest($userId, $amount = 3)
	{
		return $this->model
			->where('user_id', $userId)
			->where('inbox', Inbox::TYPE_INBOX)
			->orderBy('created_at', 'desc')
			->take($amount)
			->get();
	}

	/**
	 * Get all threads for the given user
	 * @param int $userId the current user
	 * @param string $inbox the inbox name (see \Modules\PrivateMessage\Entities\Inbox::TYPE_*)
	 * @param int $page
	 * @param int $limit
	 * @return Collection
	 */
	public function listForUser($userId, $inbox, $page = 1, $limit = 25)
	{
		return $this->model
			->where('user_id', $userId)
			->where('inbox', Inbox::TYPE_INBOX)
			->orderBy('created_at', 'desc')
			->simplePaginate($limit)
			->get();
	}
}
