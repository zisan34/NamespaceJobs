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

Route::get('/test', function () {
	// session()->flush();
	session()->forget('user_type');
	return session('user_type');
	// return 	Auth::user()->profile;
});

Auth::routes();

Route::get('selectUserType', 'Auth\RegisterController@selectUserType')->name('selectUserType');

Route::post('userType', 'Auth\RegisterController@registerForm')->name('registerForm');


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'job', 'middleware'=>'auth'], function() {
	Route::name('job.')->group(function () {

		Route::get('/create','JobsController@create')->name('create');
		Route::post('/store','JobsController@store')->name('store');
		Route::get('/all','JobsController@index')->name('all');

		Route::get('/apply/{id}','JobsController@apply')->name('apply');


});
});




Route::group(['prefix' => 'profile', 'middleware'=>'auth'], function() {
	Route::name('profile.')->group(function () {

		Route::get('/edit','ProfilesController@edit')->name('edit');
		Route::post('/update','ProfilesController@update')->name('update');

		Route::get('/view/{id}','ProfilesController@view')->name('view');



});
});
