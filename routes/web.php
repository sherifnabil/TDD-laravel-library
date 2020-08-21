<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('books', 'BooksController@store');
Route::patch('books/{book}', 'BooksController@update');
Route::delete('books/{book}', 'BooksController@destroy');

// author routes
Route::post('author', 'AuthorsController@store');
