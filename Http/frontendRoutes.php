<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'privatemessage'], function(Router $router)
{
    $router->get('box/{inbox?}', ['as' => 'privatemessage', 'uses' => 'PublicController@index']);

	$router->get('/new', ['as' => 'privatemessage.new', 'uses' => 'PublicController@createThread']);

	$router->get('/{threadId}', ['as' => 'privatemessage.show', 'uses' => 'PublicController@show']);
});
