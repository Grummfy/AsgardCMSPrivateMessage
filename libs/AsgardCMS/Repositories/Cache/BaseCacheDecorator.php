<?php

namespace Grummfy\AsgardCMS\Repositories\Cache;

use \Modules\Core\Repositories\Cache\BaseCacheDecorator AS BaseCacheDecoratorParent;

class BaseCacheDecorator extends BaseCacheDecoratorParent
{
	protected function _translatableCache($method, array $args = array(), $uniqKey = '')
	{
		return $this->cache
			->tags($this->entityName, 'global')
			->remember("{$this->locale}.{$this->entityName}.{$method}.{$uniqKey}", $this->cacheTime,
				function () use ($method, $args) {
					return call_user_func([$this->repository, $method], $args);
				}
			);
	}

	protected function _defaultCache($method, array $args = array(), $uniqKey = '')
	{
		return $this->cache
			->tags($this->entityName, 'global')
			->remember("{$this->entityName}.{$method}.{$uniqKey}", $this->cacheTime,
				function () use ($method, $args) {
					return call_user_func([$this->repository, $method], $args);
				}
			);
	}
}
