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
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Users
    Route::resource('roles','RoleController')->except([
        'show','destroy'
    ]);
    Route::resource('users','UserController')->except([
        'show'
    ]);

    // Change Password
    Route::get('change-password', 'ChangePasswordController@index')->name('change-password');

    
    // Content Route
    Route::resource('content','ContentController');
    // Members Route
    Route::resource('members','MemberController');
     // Community Route
    // Route::resource('community','Community\CommunityController');

   
    
    Route::get('community','Community\CommunityController@index')->name('community');
    Route::get('/community/{id?}','Community\CommunityController@showCommunity')->name('showCommunity');
   
    

   

    Route::group(['prefix' => 'community', 'as' => 'community.', 'namespace' => 'Community'], function () {
      
        Route::get('/dashboard/{id?}','CommunityController@dashboard')->name('dashboard');
        Route::get('/member/{id?}','CommunityController@members')->name('member');
        Route::get('/mapdata/{id?}','CommunityController@mapdata')->name('mapdata');
        Route::get('/event/{id?}','CommunityController@createevent')->name('createevent');
        Route::get('/notification/{id?}','CommunityController@createnotification')->name('createnotification');
        Route::get('/prompt/{id?}','CommunityController@prompt')->name('prompt');  
        Route::resource('events','EventController');
        Route::resource('notification','NotificationController');
        
   
    });

});
