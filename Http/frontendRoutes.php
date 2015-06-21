<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'privatemessage'], function(Router $router)
{
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('box/{inbox?}', ['as' => $locale . '.privatemessage', 'uses' => 'PublicController@index']);
    $router->get('/{threadId}', ['as' => $locale . '.privatemessage.show', 'uses' => 'PublicController@show']);
});
