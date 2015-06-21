<?php

namespace Modules\PrivateMessage\Repositories\Cache;

use Illuminate\Database\Eloquent\Collection;
use Modules\PrivateMessage\Repositories\ThreadRepository;
use Grummfy\AsgardCMS\Repositories\Cache\BaseCacheDecorator;

class CacheThreadDecorator extends BaseCacheDecorator implements ThreadRepository
{
    public function __construct(ThreadRepository $thread)
    {
        parent::__construct();
        $this->entityName = 'privatemessage.threads';
        $this->repository = $thread;
    }

	public function listForUser($userId, $inbox, $limit = 25)
	{
		return $this->_defaultCache('listForUser', compact('userId', 'inbox', 'limit'), "{$userId}-{$inbox}-{$limit}");
	}
}
