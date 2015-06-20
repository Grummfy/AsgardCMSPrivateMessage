<?php namespace Modules\PrivateMessage\Providers;

use Illuminate\Support\ServiceProvider;

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
                $repository = new \Modules\PrivateMessage\Repositories\Eloquent\EloquentMessageRepository(new \Modules\PrivateMessage\Entities\Message());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\PrivateMessage\Repositories\Cache\CacheMessageDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\PrivateMessage\Repositories\ThreadRepository',
            function () {
                $repository = new \Modules\PrivateMessage\Repositories\Eloquent\EloquentThreadRepository(new \Modules\PrivateMessage\Entities\Thread());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\PrivateMessage\Repositories\Cache\CacheThreadDecorator($repository);
            }
        );
// add bindings


    }
}
