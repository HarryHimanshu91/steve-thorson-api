<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');
Route::get('/home', function () {
    // dd(\Auth::user());
    if(\Auth::user()->role_id==1){
        return redirect()->route('admin.home');
    }
    return redirect()->route('community.home');
})->middleware('auth:admin');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Users
    Route::resource('roles','RoleController')->except([
        'show','destroy'
    ]);
    Route::resource('admins','AdminController')->except([
        'show'
    ]);

    // Change Password
    Route::get('change-password', 'ChangePasswordController@index')->name('change-password');

    // Update Change Password
    Route::post('change-password', 'ChangePasswordController@updatePassword')->name('change-password');
    
    // Content Route
    // Route::resource('content','ContentController');
    // Members Route
    Route::resource('members','MemberController');
     // Community Route
    Route::get('community','Community\CommunityController@index')->name('community');
    Route::get('/community/{id?}','Community\CommunityController@showCommunity')->name('showCommunity');
   
    //Content Language  Controller
    
    Route::get('content','ContentController@index')->name('viewAllContent');
    Route::get('content/create','ContentController@create')->name('createContent');
    Route::post('content/store','ContentController@store')->name('content.store');
    Route::get('content/{id}','ContentController@editContent')->name('editContent');
    Route::post('content/{id}','ContentController@update')->name('content.update');
    Route::get('content/view/{id}','ContentController@showContent')->name('showContent');
    Route::post('content/delete/{id}','ContentController@deleteContent')->name('deleteContent');

    Route::group(['prefix' => 'community', 'as' => 'community.', 'namespace' => 'Community'], function () {
        Route::get('/dashboard/{id?}','CommunityController@dashboard')->name('dashboard');
        Route::get('/member/{id?}','CommunityController@members')->name('member');
        Route::get('/mapdata/{id?}','CommunityController@mapdata')->name('mapdata');
        Route::post('/mapdata/import/{id?}', 'CommunityController@importMapData')->name('import');
        Route::get('/event/{id?}','CommunityController@createevent')->name('createevent');
        Route::get('/notification/{id?}','CommunityController@createnotification')->name('createnotification');
        Route::get('/prompt/{id?}','CommunityController@prompt')->name('prompt');  
     
        Route::post('/event/save','EventController@storeEvents')->name('saveEvent');
        Route::get('/event/{id}/show/{cId}','EventController@showEvent')->name('listEvent');

        Route::post('/notification/save','NotificationController@storeNotifications')->name('saveNotification');
        Route::get('/notification/{id}/show/{cId}','NotificationController@showNotification')->name('listNotification');
   
    });
});

Route::group(['prefix' => 'community', 'as' => 'community.', 'namespace' => 'Community', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/members','MemberController@index')->name('members');
    Route::get('/mapdata','MapDataController@index')->name('mapdata');
    Route::post('/mapdata/import/{id?}', 'MapDataController@importMapData')->name('import');
    Route::get('/events','EventController@index')->name('events');
    Route::post('/events/store','EventController@store')->name('events.store');
    Route::get('/events/{id}/show/{cId}','EventController@show')->name('events.show');
    Route::get('/notifications','NotificationController@index')->name('notifications');
    Route::post('/notifications/store','NotificationController@store')->name('notifications.store');
    Route::get('/notifications/{id}/show/{cId}','NotificationController@show')->name('notifications.show');
});
