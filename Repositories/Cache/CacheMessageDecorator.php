<?php

namespace Modules\PrivateMessage\Repositories\Cache;

use Grummfy\AsgardCMS\Repositories\Cache\BaseCacheDecorator;
use Modules\PrivateMessage\Repositories\MessageRepository;

class CacheMessageDecorator extends BaseCacheDecorator implements MessageRepository
{
    public function __construct(MessageRepository $message)
    {
        parent::__construct();
        $this->entityName = 'privatemessage.messages';
        $this->repository = $message;
    }

	public function findForUser($userId, $threadId, $limit = 25)
	{
		return $this->_defaultCache('findForUser', compact('userId', 'threadId', 'limit'), "{$userId}-{$threadId}-{$limit}");
	}
}
