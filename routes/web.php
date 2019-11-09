<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/notAdmin', function () {
    return view('helpers.NotAdmin');
});

Route::get('/home', function () {
    return redirect()->route('shop');
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/session-flush', function () {
    \session()->flush();
    return "Session is cleared";
});

// Shop
Route::get('/', 'ShopController@index')->name('shop');
Route::post('shop/filters', 'ShopController@filters')->name('shop.filters');
Route::get('shop/filters', 'ShopController@filters')->name('shop.filters');
Route::get('shop/search', 'ShopController@search')->name('shop.search');
Route::post('shopping-cart', 'ShopController@shopping_cart')->name('shopping-cart');
Route::get('shopping-cart', 'ShopController@shopping_cart')->name('shopping-cart');
Route::get('contact', 'ShopController@contact')->name('contact');
Route::get('control-panel', 'ShopController@control_panel')->name('control-panel');
Route::get('taxes/{com}', 'ShopController@taxes');
Route::post('contact-email', 'ShopController@contactemail')->name('contact-email');
Route::get('split', 'StockController@split')->name('split');
Route::get('large-map', 'ShopController@show_large_map')->name('large-map');

// Users
Route::get('users/index', 'UserController@index')->name('users.index');
Route::post('users/get-user-role', 'UserController@get_user_role')->name('users.get-user-role');
Route::post('users/update-role', 'UserController@update_role')->name('users.update-role');

// Books
Route::get('books/sample', 'BookController@sample')->name('books.sample');
Route::post('books/drag-and-drop-upload', 'BookController@drag_and_drop_upload')->name('books.drag-and-drop-upload');
Route::get('books/import-from-CSV', 'BookController@import_from_CSV')->name('books.import-from-CSV');
Route::resource('books', 'BookController');
Route::post('books/rate', 'BookController@rate')->name('books.rate');

// Categories
Route::post('categories/get-category', 'CategoryController@get_category')->name('categories.get-category');
Route::post('categories/remove-book', 'CategoryController@remove_book')->name('categories.remove-book');
Route::resource('categories', 'CategoryController');

// Comments
Route::resource('comments', 'CommentController');
Route::post('comments/rate', 'CommentController@rate')->name('comments.rate');

// Offers
Route::post('offers/get-offer', 'OfferController@get_offer')->name('offers.get-offer');
Route::resource('offers', 'OfferController');

// Profiles
Route::resource('profiles', 'ProfileController');
Route::post('profiles/add-to-wishlist', 'ProfileController@add_to_wishlist')->name('profiles.add-to-wishlist');

// Invoices
Route::resource('invoices', 'InvoiceController');
Route::post('invoices/exportPDF', 'InvoiceController@exportPDF')->name('exportPDF');

// Requirements
Route::resource('requirements', 'RequirementController');
Route::post('requirements/get-requirement', 'RequirementController@get_requirement')->name('categories.get-requirement');

// Stocks
Route::resource('stocks', 'StockController');
Route::post('stocks/get-stock', 'StockController@get_stock')->name('stocks.get-stock');
