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
        $api->post('test', function() use ($api) {
            dd($api);
        });
});
$app->get('bla', function () use ($app) {
    return $app->version();

    //dd($app);
});
