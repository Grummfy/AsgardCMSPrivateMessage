<?php namespace Modules\PrivateMessage\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface MessageRepository extends BaseRepository
{
	/**
	 * Get the message on the thread for the given user
	 * @param int $userId
	 * @param int $threadId
	 * @param int $limit
	 * @return Collection
	 */
	public function findForUser($userId, $threadId, $limit = 25);
}
