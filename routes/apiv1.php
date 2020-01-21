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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->GET('prueba',         ['uses' => 'BookController@check']);

    $router->GET('libros',         ['uses' => 'BookController@getBooks']);

    $router->POST('libros',        ['uses' => 'BookController@storeBook']);

    $router->GET('libros/{id}',    ['uses' => 'BookController@getOneBook']);

    $router->PUT('libros/{id}',    ['uses' => 'BookController@updateBook']);

    $router->DELETE('libros/{id}', ['uses' => 'BookController@destroyBook']);

});
