<?php namespace Modules\PrivateMessage\Repositories\Cache;

use Illuminate\Database\Eloquent\Collection;
use Modules\PrivateMessage\Repositories\ThreadRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

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
		return $this->cache
			->tags($this->entityName, 'global')
			->remember("{$this->entityName}.listForUser.{$userId}-{$inbox}-{$limit}", $this->cacheTime,
				function () use ($userId, $inbox, $limit) {
					return $this->repository->listForUser($userId, $inbox, $limit);
				}
			);
	}
}
