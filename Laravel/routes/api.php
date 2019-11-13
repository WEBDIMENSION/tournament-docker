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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('score/u/{winner}/{score}', 'Score\ScoreController@scoreEdit');
Route::middleware('auth:api')->get('score/get_tournament/{event_number}', 'Api\ScoreController@getTournament');
Route::middleware('auth:api')->get('score/get_card/{tournament_id}', 'Api\ScoreController@getCard');
Route::middleware('auth:api')->post('score/post_tournament', 'Api\ScoreController@postTournament');

