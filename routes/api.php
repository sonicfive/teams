<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function () {
    Route::get('/teams/{id}', 'TeamController@show');
    Route::get('/teams/{id}/players', 'TeamController@show_players');
    Route::get('/teams', 'TeamController@show_all');  
    Route::post('/teams/create', 'TeamController@create');  
    Route::post('/teams/update', 'TeamController@update');
    Route::post('/teams/delete', 'TeamController@delete'); 

    Route::get('/players/{id}', 'PlayerController@show');
    Route::get('/players/{id}/team', 'PlayerController@show_team');
    Route::get('/players', 'PlayerController@show_all');
    Route::post('/players/create', 'PlayerController@create');  
    Route::post('/players/update', 'PlayerController@update');
    Route::post('/players/delete', 'PlayerController@delete'); 
}); 



