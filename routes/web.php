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
Route::get('/welcome', [
    'middleware' => 'auth',
    'uses' => 'WelcomeController@welcome'
]);

/*
 * Users
 */
Route::get('/account', [
    'middleware' => 'auth',
    'uses' => 'UserController@account'
]);


/*
 * Searches
 */
Route::get('/search', [
    'middleware' => 'auth',
    'uses' => 'SearchController@create'
]);

Route::get('/search-process', [
    'middleware' => 'auth',
    'uses' => 'SearchController@processSearch'
]);

Route::get('/search/created', [
    'middleware' => 'auth',
    'uses' => 'SearchController@searchCreated'
]);


Route::get('/modify', [
    'middleware' => 'auth',
    'uses' => 'SearchController@modifyIndex'
]);

Route::get('/modify/{name}', [
    'middleware' => 'auth',
    'uses' => 'SearchController@modify'
]);

Route::put('/modify-process', [
    'middleware' => 'auth',
    'uses' => 'SearchController@processModify'
]);

Route::get('/modify/{name}/updated', [
    'middleware' => 'auth',
    'uses' => 'SearchController@modifyUpdated'
]);


Route::get('/review', [
    'middleware' => 'auth',
    'uses' => 'SearchController@reviewIndex'
]);

Route::get('/review/{name}', [
    'middleware' => 'auth',
    'uses' => 'SearchController@review'
]);

Route::delete('/remove', [
    'middleware' => 'auth',
    'uses' => 'SearchController@remove'
]);

Auth::routes();
