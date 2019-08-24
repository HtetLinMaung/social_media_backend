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

Route::get('comment', 'CommentController@index');

Route::get('comment/{id}', 'CommentController@show');

Route::post('comment', 'CommentController@store');

Route::put('comment', 'CommentController@store');

Route::delete('comment/{id}', 'CommentController@destroy');

Route::apiResource('innerComment', 'InnerCommentController');

