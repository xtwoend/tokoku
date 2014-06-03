<?php
/**
 * Backend Route 
 * Abdul Hafidz Anshari
 * aditans88@gmail.com
 */


Route::group(['before' => 'authsentry' ,'namespace'=>'Backend\Controllers','prefix' => 'admin'], function()
{
	Route::get('/', 'DashController@index');
	Route::get('logout', ['as'=>'auth.logout','uses'=>'AuthController@logout']);	
});	


Route::group(['namespace'=>'Backend\Controllers', 'prefix' => 'admin'], function()
{
	Route::get('login', 'AuthController@index');
	Route::post('login', ['as'=>'auth.login','uses'=>'AuthController@auth']);
});