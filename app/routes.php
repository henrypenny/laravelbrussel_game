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

// Show the login page at root level.
Route::get('/', "SessionsController@create");

// Session routes
Route::get("login", "SessionsController@create");
Route::get("logout", "SessionsController@destroy");
Route::post("register", array( "as" => "sessions.register", "uses" => "SessionsController@register"));
Route::resource('sessions', 'SessionsController');

// Actual game view
Route::get('game', "ScoreController@highscore")->before("auth");

//Score: Ajax List score at level
Route::post( 'score/{level}', array('as' => 'score.index', 'uses' => 'ScoreController@index'));

//Score: Update score when game over.
Route::post( 'score/update/{level}/{score}', array('as' => 'score.update', 'uses' => 'ScoreController@update'));
