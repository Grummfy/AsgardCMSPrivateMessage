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
}
