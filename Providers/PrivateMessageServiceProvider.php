<?php namespace Modules\PrivateMessage\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\PrivateMessage\Entities\Message;
use Modules\PrivateMessage\Entities\Thread;
use Modules\PrivateMessage\Repositories\Cache\CacheMessageDecorator;
use Modules\PrivateMessage\Repositories\Cache\CacheThreadDecorator;
use Modules\PrivateMessage\Repositories\Eloquent\EloquentMessageRepository;
use Modules\PrivateMessage\Repositories\Eloquent\EloquentThreadRepository;

class PrivateMessageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\PrivateMessage\Repositories\MessageRepository',
            function () {
                $repository = new EloquentMessageRepository(new Message());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheMessageDecorator($repository);
            }
        );

        $this->app->bind(
            'Modules\PrivateMessage\Repositories\ThreadRepository',
            function () {
                $repository = new EloquentThreadRepository(new Thread());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheThreadDecorator($repository);
            }
        );
    }
}
