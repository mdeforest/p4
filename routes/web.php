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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/welcome', 'WelcomeController@welcome')->name('welcome');

    /*
     * Users
     */
    Route::get('/account', 'UserController@account')->name('account');
    Route::get('/account/edit', 'UserController@accountEdit')->name('account.edit');
    Route::put('/account-process', 'UserController@processAccount')->name('account-process');

    /*
     * Searches
     */
    Route::get('/search/platform', 'SearchController@searchPlatform')->name('search.platform');
    Route::get('/platform-process', 'SearchController@processPlatform')->name('platform-process');
    Route::get('/search', 'SearchController@create')->name('search');
    Route::get('/search-process', 'SearchController@processSearch')->name('search-process');
    Route::get('/search/created', 'SearchController@searchCreated')->name('search.created');
    Route::get('/help/{name}', 'SearchController@help')->name('help.name');

    Route::get('/modify', 'SearchController@modifyIndex')->name('modify');
    Route::get('/modify/{name}', 'SearchController@modify')->name('modify.name');
    Route::put('/modify-process', 'SearchController@processModify')->name('modify-process');
    Route::get('/modify/{name}/updated', 'SearchController@modifyUpdated')->name('modify.name.updated');

    Route::get('/review', 'SearchController@reviewIndex')->name('review');
    Route::get('/review/{name}', 'SearchController@review')->name('review.name');
    Route::get('/run', 'SearchController@run')->name('run');
    Route::delete('/remove', 'SearchController@remove')->name('remove');
});

Auth::routes();
