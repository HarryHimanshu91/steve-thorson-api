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

Route::post('register','Api\V1\UserController@register'); 
Route::post('login','Api\V1\UserController@checkUserLogin');
Route::get('language','Api\V1\LanguageController@languageList');

Route::middleware('auth:api')->group( function () {

    Route::post('change-password','Api\V1\ChangePasswordController@updatePassword');

});