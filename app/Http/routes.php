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

$router->group(['prefix' => 'admin'], function() use($router) {
    $router->get('/', 'AdminController@dashboard');
});

$router->get('/post/{post}', '');

$router->get('/', 'TagPageController@page');
$router->get('/{path}', 'TagPageController@page');

/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

$router->controllers([
	'auth' => 'AuthController',
	'password' => 'PasswordController',
]);
