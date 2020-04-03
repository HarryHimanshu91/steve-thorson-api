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

    // Category
    Route::resource('category','CategoryController');

});
