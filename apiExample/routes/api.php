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
Route::prefix('v1')->namespace('APi\v1')->group(function (){
    Route::get('/courses','CourseController@index');
    Route::get('/courses/{course}','CourseController@single');
    //اعتبار سنجی-تست
    Route::post('/courses','CourseController@store');

    Route::post('login','UserController@login');
    Route::post('register','UserController@register');

    Route::middleware('auth:api')->group(function (){
       Route::get('/user',function (){
           return auth()->user();
       });
       Route::post('/comment','CommentController@store');


    });

});
