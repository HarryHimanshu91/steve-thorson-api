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
    Route::post('content/create','ContentController@saveLanguage1')->name('saveContent1');
    Route::post('content/creates','ContentController@saveLanguage2')->name('saveContent2');
    Route::get('content/{id}','ContentController@editContent')->name('editContent');
    Route::post('content/{id}','ContentController@updateContent')->name('updateContent');
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
     
        Route::resource('events','EventController');
        Route::resource('notifications','NotificationController');
        
   
    });
});
