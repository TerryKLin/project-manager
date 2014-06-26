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

Route::get('/', array('uses' => "UserController@index", 'as' => 'home'));

Route::get('register', array('uses' => 'UserController@register','as' => 'register'));
Route::post('login', array('uses' => 'UserController@login','as' => 'login'));
Route::post('logout', array('uses' => 'UserController@logout','as' => 'logout'));
Route::resource('user', 'UserController', array('except' => array('create')));

Route::resource("projects","ProjectController");

Route::get('projects/votes', array('uses' => 'ProjectVoteController@index','as' => 'projects.votes.index'));
Route::resource("projects.votes","ProjectVoteController", array('only' => array('store', 'destroy')));
