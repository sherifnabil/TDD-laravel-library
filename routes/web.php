<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('books', 'BooksController@store');
Route::patch('books/{book}', 'BooksController@update');
Route::delete('books/{book}', 'BooksController@destroy');

Route::post('/checkout/{book}', 'CheckoutBookController@store');
Route::post('/checkin/{book}', 'CheckinBookController@store');


// author routes
Route::post('authors', 'AuthorsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
