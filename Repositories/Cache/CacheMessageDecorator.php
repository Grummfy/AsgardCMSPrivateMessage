<?php namespace Modules\PrivateMessage\Repositories\Cache;

use Modules\PrivateMessage\Repositories\MessageRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

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
		return $this->cache
			->tags($this->entityName, 'global')
			->remember("{$this->entityName}.findForUser.{$userId}-{$threadId}-{$limit}", $this->cacheTime,
				function () use ($userId, $threadId, $limit) {
					return $this->repository->findForUser($userId, $threadId, $limit);
				}
			);
	}
}
