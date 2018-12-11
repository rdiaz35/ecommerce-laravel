<?php

//Frontend Site
Route::get('/', 'HomeController@index');


//Backend routes
//==========================================================
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
//==========================================================