<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/fractal/collection', 'FractalController@showCollection');
Route::get('/fractal/item', 'FractalController@showItem');

Route::get('/books', 'BookController@index');
Route::get('/booksAllWithTransformer', 'BookController@booksAllWithTransformer');
Route::get('/bookItemWithTransformer', 'BookController@bookItemWithTransformer');
