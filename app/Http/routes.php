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
        $api->post('test', function() use ($api) {
            dd($api);
        });
        $api->get('spendings', 'SpendingController@index');
    });
});
$app->get('bla', function () use ($app) {
    return view('index');

    //dd($app);
});
