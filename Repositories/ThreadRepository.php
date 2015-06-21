<?php

namespace Modules\PrivateMessage\Repositories;

use \Modules\Core\Repositories\BaseRepository;
use \Illuminate\Database\Eloquent\Collection;

interface ThreadRepository extends BaseRepository
{
	/**
	 * Get all threads for the given user
	 * @param int $userId the current user
	 * @param string $inbox the inbox name (see \Modules\PrivateMessage\Entities\Inbox::TYPE_*)
	 * @param int $limit
	 * @return Collection
	 */
	public function listForUser($userId, $inbox, $limit = 25);
}
