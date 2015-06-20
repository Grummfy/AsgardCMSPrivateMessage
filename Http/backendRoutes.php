<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/privatemessage'], function (Router $router) {
        $router->bind('messages', function ($id) {
            return app('Modules\PrivateMessage\Repositories\MessageRepository')->find($id);
        });
        $router->resource('messages', 'MessageController', ['except' => ['show'], 'names' => [
            'index' => 'admin.privatemessage.message.index',
            'create' => 'admin.privatemessage.message.create',
            'store' => 'admin.privatemessage.message.store',
            'edit' => 'admin.privatemessage.message.edit',
            'update' => 'admin.privatemessage.message.update',
            'destroy' => 'admin.privatemessage.message.destroy',
        ]]);
        $router->bind('threads', function ($id) {
            return app('Modules\PrivateMessage\Repositories\ThreadRepository')->find($id);
        });
	$router->resource('threads', 'ThreadController', ['except' => ['show'], 'names' => [
		'index' => 'admin.privatemessage.thread.index',
		'create' => 'admin.privatemessage.thread.create',
		'store' => 'admin.privatemessage.thread.store',
		'edit' => 'admin.privatemessage.thread.edit',
		'update' => 'admin.privatemessage.thread.update',
		'destroy' => 'admin.privatemessage.thread.destroy',
	]]);
// append


});
