<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('books', 'BooksController@store');
Route::patch('books/{book}', 'BooksController@update');