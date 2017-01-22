<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['domain' => env('WEB_DOMAIN')], function () {
   	
   	Route::get('/','BlogController@index');
	Route::get('/blog/{slog}','BlogController@getOneBySlug');

});


Route::group(['domain' => env('CPANEL_DOMAIN') , 'namespace' => 'cpanel'], function () {
	Auth::routes();
	
	Route::group(['middleware'=>'auth'], function () {
	  	Route::get('/home', 'HomeController@index');
		Route::resource('blogs', 'BlogController');
		Route::get('/',function(){
			return redirect()->to('/home');
		});
	});

	
});



Route::group(['domain' => env('API_DOMAIN') , 'namespace' => 'Api'], function () {

	Route::get('/feed/{page?}','BlogController@feed');	
	Route::get('/blog/{slug}','BlogController@getOneBlog');
});


