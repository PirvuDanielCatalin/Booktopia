<?php

Auth::routes();
Route::get('/notAdmin', function (){
    return view('NotAdmin');
});

// Shop
Route::get('/', 'ShopController@index')->name('shop');
Route::get('/shopping-cart', 'ShopController@shopping_cart')->name('shopping-cart');
Route::get('/control-panel', 'ShopController@control_panel')->name('control-panel');
Route::post('/contact-email', 'ShopController@contactemail')->name('contact-email');

// Users
Route::get('users/index', 'UserController@index')->name('users.index');
Route::post('users/update-roles', 'UserController@update_roles')->name('users.update-roles');
Route::get('users/exportExcel', 'UserController@exportExcel')->name('users.exportExcel');
Route::get('users/exportPDF', 'UserController@exportPDF')->name('users.exportPDF');

// Books
Route::get('books/exportExcel', 'BookController@exportExcel')->name('books.exportExcel');
Route::get('books/exportPDF', 'BookController@exportPDF')->name('books.exportPDF');
Route::resource('books', 'BookController');

// Categories
Route::resource('categories', 'CategoryController');




