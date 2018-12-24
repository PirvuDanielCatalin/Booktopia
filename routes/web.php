<?php

Route::get('/', 'ShopController@index');
Route::get('/control-panel','ShopController@control_panel')->name('control-panel');
Route::post('/contact-email','ShopController@contactemail')->name('contact-email');

Auth::routes();
Route::get('users/index','UserController@index')->name('users.index');
Route::resource('books','BookController');
Route::resource('categories','CategoryController');

