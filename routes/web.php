<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Home
 */
Route::get('/', 'WelcomeController@index');

/*
 * Searches
 */
Route::get('/search', 'SearchController@create');
Route::get('/search-process', 'SearchController@processSearch');
Route::get('/search/created', 'SearchController@searchCreated');

Route::get('/modify', 'SearchController@modifyIndex');
Route::get('/modify/{name}', 'SearchController@modify');
Route::put('/modify-process', 'SearchController@processModify');
Route::get('/modify/{name}/updated', 'SearchController@modifyUpdated');

Route::get('/review', 'SearchController@reviewIndex');
Route::get('/review/{name}', 'SearchController@review');

Route::delete('/remove', 'SearchController@remove');

Auth::routes();
