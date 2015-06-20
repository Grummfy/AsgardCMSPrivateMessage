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

	public function latest($amount = 3)
	{
		return $this->cache
			->tags($this->entityName, 'global')
			->remember("{$this->entityName}.latest.{$amount}", $this->cacheTime,
				function () use ($amount) {
					return $this->repository->latest($amount);
				}
			);
	}

	public function listForUser($userId, $inbox, $page = 1, $limit = 25)
	{
		return $this->cache
			->tags($this->entityName, 'global')
			->remember("{$this->entityName}.listForUser.{$userId}-{$inbox}-{$page}-{$limit}", $this->cacheTime,
				function () use ($userId, $inbox, $page, $limit) {
					return $this->repository->listForUser($userId, $inbox, $page, $limit);
				}
			);
	}
}
