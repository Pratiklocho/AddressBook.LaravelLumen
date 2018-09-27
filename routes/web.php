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

$router->group(['prefix' => 'api'], function () use ($router) {
    

    $router->get('AllUsers',  ['uses' => 'UsersController@showAllUsers']);
    $router->post('loginUser',  ['uses' => 'UsersController@loginUser']);
    $router->post('registerUser' , ['uses' => 'UsersController@registerUser']);
    
    //Address Book Routes
    //$router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->get('addressBook/{id}',  ['uses' => 'AddressBookController@showAllAddress']);
    $router->post('add-address', ['uses' => 'AddressBookController@addAddress']);
    $router->delete('delete-address/{id}', ['uses' => 'AddressBookController@deleteAddress']);
    $router->post('update-address/{id}', ['uses' => 'AddressBookController@updateAddress']);
    
    //$router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    //$router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});
