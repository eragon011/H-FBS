<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'app','middleware'=>'auth'], function()
{
  Route::group(['prefix' => 'handlebars'], function()
  {
    Route::get('main','App\handlebarsController@index');
    Route::get('get',"App\handlebarsController@getData");
  });

  Route::group(['prefix' => 'h-fbs'], function()
  {
    Route::get('index','App\AppController@index');
    Route::get('admin','App\AppController@admin');
    Route::get('admin/{id}','App\AppController@adminWithPatient');
    Route::post('admin/{id}/update','App\AppController@update');
    Route::get('patient','App\AppController@patient');
  });

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
