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


/*Route::get('comment', 'CommentController@index');

Route::get('comment/{id}', 'CommentController@show');

Route::post('comment', 'CommentController@store');

Route::put('comment', 'CommentController@store');*/

// Route::delete('comment/{id}', 'CommentController@destroy');

Route::apiResources([
    'comment' => 'CommentController',
    'innerComment' => 'InnerCommentController']);


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
    Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('/posts', 'PostsController');
   
    });

