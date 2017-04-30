<?php

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

use Illuminate\Http\Request;

$app->get('/', function () use ($app) {
    "Waddup";
    return $app->version();
  });

$app->get('/products', 'ProductsController@index');
$app->get('/products/{id}', 'ProductsController@show');
$app->post('/products', 'ProductsController@create');
$app->put('/products/{id}', 'ProductsController@update');
$app->get('/stores', 'StoresController@index');
$app->get('/reviews', 'ReviewsController@index');
