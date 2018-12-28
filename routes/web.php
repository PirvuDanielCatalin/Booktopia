<?php

Auth::routes();
Route::get('/notAdmin', function (){
    return view('NotAdmin');
});

Route::get('/', 'ShopController@index')->name('shop');
Route::get('/shopping-cart', 'ShopController@shopping_cart')->name('shopping-cart');
Route::get('/control-panel', 'ShopController@control_panel')->name('control-panel');
Route::post('/contact-email', 'ShopController@contactemail')->name('contact-email');

Route::get('users/index', 'UserController@index')->name('users.index');
Route::post('users/update-roles', 'UserController@update_roles')->name('users.update-roles');
Route::resource('books', 'BookController');
Route::resource('categories', 'CategoryController');