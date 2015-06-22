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

	public function boot()
	{
		// on publish duplicates files from views to main  project
		$this->publishes([
			__DIR__.'/../Resources/views/' => base_path('resources/views/asgard/private-message'),
		]);

		// if file are defined, override it
		$this->loadViewsFrom(base_path('resources/views/asgard/private-message'), 'private-message');
		// otherwise load the file
		$this->loadViewsFrom(__DIR__.'/../Resources/views', 'private-message');
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
