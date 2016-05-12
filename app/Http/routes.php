<?php
$api = app(Dingo\Api\Routing\Router::class  );

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api->version('v1', function($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function($api) {

        $api->post('login', 'AuthController@authenticate');
        $api->post('register', 'AuthController@register');
        $api->get('verify/{verification_string}', 'AuthController@verify');

        $api->group( [ 'middleware' => 'jwt.auth' ], function ($api) {
            $api->get('users/me', 'AuthController@me');
            $api->get('validate_token', 'AuthController@validateToken');
        });
    });
});
$app->get('/', function () use ($app) {
    
    return view('index');
});
