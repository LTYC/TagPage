<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$router->pattern('path', '[a-z0-9\-/]+');

$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function() use($router) {
    $router->get('/', 'Admin\AdminController@dashboard');
	$router->get('/partials/{view}', 'Admin\PartialsController@load');
});

$router->controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

$router->get('/post/{post}', '');

$router->get('/', 'TagPageController@page');
$router->get('/{path}', 'TagPageController@page');
