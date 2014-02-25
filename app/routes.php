<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');

// Route::controller('users', 'UsersController');

	/*
	|-----------------------------------------------------------------------
	| User Profile Stuff
	|-----------------------------------------------------------------------
	*/

Route::get('profile/dashboard', 'UserProfileController@getDashboard');
Route::post('profile/dashboard', 'UserProfileController@postDashboard');

Route::get('profile/messages', 'UserProfileController@getMessages');
Route::post('profile/messages', 'UserProfileController@postMessages');

Route::get('profile/settings', 'UserProfileController@getProfile');
Route::put('profile/settings/editprofilepic', 'UserProfileController@postUpload');
Route::put('profile/settings/editname', 'UserProfileController@updateName');
Route::put('profile/settings/editemail', 'UserProfileController@updateEmail');
Route::put('profile/settings/editpass', 'UserProfileController@updatePass');
Route::put('profile/settings/editdesc', 'UserProfileController@updateDesc');

Route::get('profile/adminsettings', 'UserProfileController@getAdminSettings');
Route::post('profile/adminsettings', 'UserProfileController@newUser');

Route::get('profile/plan', 'UserProfileController@getPlan');
Route::post('profile/plan', 'UserProfileController@updatePlan');

Route::get('profile/{username}', 'UserProfileController@getUserProfile');

	/*
	|-----------------------------------------------------------------------
	| Login / Logout & Dashboard
	|-----------------------------------------------------------------------
	*/

Route::get('register', 'UsersController@getRegister');
Route::post('users/create', 'UsersController@postRegister');

Route::get('login', 'UsersController@getLogin');
Route::post('users/signin', 'UsersController@postLogin');

Route::get('logout', 'UsersController@getLogout');



	/*
	|-----------------------------------------------------------------------
	| Filters
	|-----------------------------------------------------------------------
	*/

