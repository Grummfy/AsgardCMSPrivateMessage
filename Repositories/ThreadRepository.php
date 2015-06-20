<?php

namespace Modules\PrivateMessage\Repositories;

use \Modules\Core\Repositories\BaseRepository;
use \Illuminate\Database\Eloquent\Collection;

interface ThreadRepository extends BaseRepository
{
	/**
	 * Return the latest x thread
	 * @param int $userId the current user
	 * @param int $amount
	 * @return Collection
	 */
	public function latest($userId, $amount = 3);

	/**
	 * Get all threads for the given user
	 * @param int $userId the current user
	 * @param string $inbox the inbox name (see \Modules\PrivateMessage\Entities\Inbox::TYPE_*)
	 * @param int $page
	 * @param int $limit
	 * @return Collection
	 */
	public function listForUser($userId, $inbox, $page = 1, $limit = 25);
}
