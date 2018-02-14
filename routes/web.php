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

//(OK) Routes to check the roles before displaying the the pages
Route::middleware('role:superadministrator|administrator|editor|member|subscriber')->group(function() {
   //(OK) Route to fill in the user details after redirected from the register page
   Route::get('register/user/details', 'RegisterUserController@showUserDetailsForm')->name('register.user.details');
   //(OK) Route to post the user details form on submittion
   Route::post('register/user/details', 'RegisterUserController@postUserDetailsForm')->name('register.user.details');
   //(OK) Route to check if username is unique through ajax request on register/user/details page
   Route::get('/api/username/unique', 'RegisterUserController@apiCheckUniqueUserName')->name('api.username.unique');
   //(OK) Route to upload image page after redirected from the register/user/details page
   Route::get('register/user/image', 'RegisterUserController@showUserImageForm')->name('register.user.image');
   //(OK) Route to post image after upload from the register/user/images page
   Route::post('register/user/image', 'RegisterUserController@postUserImageForm')->name('register.user.image');
});

   //(OK) Route to check if email is unique through ajax request on register page
Route::get('/email/unique', 'RegisterUserController@checkUniqueEmail')->name('email.unique');
   //(OK) Route to get city through ajax request on register/user/details page
Route::get('/get/city', 'RegisterUserController@ajaxGetCity')->name('get.city');

Route::get('/registration', 'RegisterUserController@showRegistrationForm')->name('registration');
Route::get('/home', 'HomeController@index')->name('home');
