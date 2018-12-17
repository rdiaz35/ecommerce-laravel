<?php

//Frontend Site
Route::get('/', 'HomeController@index');

//==========================================================
//Mostrar productos por categoria
Route::get('/product_by_category/{category_id}', 'HomeController@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}', 'HomeController@show_product_by_manufacture');
Route::get('/view_product/{product_id}', 'HomeController@product_details_by_id');
//==========================================================
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{id}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');
//LOGIN
//==========================================================
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
//customer login and logout
Route::post('/customer-login','CheckoutController@customer_login');
Route::post('/customer-logout','CheckoutController@customer_logout');

Route::get('/payment','CheckoutController@payment');
//Backend routes
//==========================================================
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
//==========================================================
Route::get('/all-category','CategoryController@all_category');
Route::get('/add-category','CategoryController@index');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');

Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
//==========================================================
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/save-manufacture','ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');

Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
//==========================================================
Route::get('/all-product','ProductController@all_product');
Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');

Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
//==========================================================
Route::get('/all-slider','SliderController@all_slider');
Route::get('/add-slider','SliderController@index');
Route::post('/save-slider','SliderController@save_slider');

Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');