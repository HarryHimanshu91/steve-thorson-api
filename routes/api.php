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
Route::post('forget-password','Api\V1\ForgetPasswordController@forgetPassword');
Route::get('language','Api\V1\LanguageController@languageList');
Route::get('regions','Api\V1\RegionController@regions');

Route::middleware('auth:api')->group( function () {

    Route::post('profile','Api\V1\EditProfileController@index'); 
    Route::post('change-password','Api\V1\ChangePasswordController@updatePassword');

    Route::get('contents','Api\V1\ContentController@contents');
    Route::get('community/{id}','Api\V1\CommunityController@community');
    
    Route::post('device-token','Api\V1\FCMController@saveToken');
});