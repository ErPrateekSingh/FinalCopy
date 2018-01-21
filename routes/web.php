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

Route::get('/', function () {
   return view('welcome');
});

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|member')->group(function() {
   Route::get('/', 'ManageController@index');
   /* CareZone is for Admin And SuperAdministrator Only */
   Route::get('/carezone', 'ManageController@carezone')->middleware('role:superadministrator|administrator')->name('manage.dashboard');
   Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
});

/* Route to fill in the user details after redirected from the register page
/ no default permission hence showing error, will update and add this later
/Route::get('/user/details', 'RegistrationController@showRegisterUserDetailsForm')->middleware('role:superadministrator|administrator|editor|member|subscriber')->name('user.details');
*/
Route::get('/user/details', 'RegistrationController@showRegisterUserDetailsForm')->name('user.details');

/* Route to check if email is unique through ajax request on register page*/
Route::get('/email/unique ', 'RegistrationController@checkUniqueEmail')->name('email.unique');

Route::get('/registration', 'RegistrationController@showRegistrationForm')->name('registration');
Route::get('/home', 'HomeController@index')->name('home');
