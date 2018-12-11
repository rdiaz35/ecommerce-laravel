<?php

//Frontend Site
Route::get('/', 'HomeController@index');


//Backend routes
//==========================================================
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
//==========================================================