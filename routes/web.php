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
Route::get('/', function () {
    return view('welcome');
});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@create')->name('register');
Route::post('register', 'Auth\RegisterController@store');


Route::group(['middleware' => ['auth']], function () {

    Route::get('beer', 'BeerPageController@get')->name('beer');
    Route::get('/beer/{beer_id}', 'BeerPageController@beerInfo')->name('beerInfo');

    Route::post('beer', 'BeerPageController@post');
    Route::post('/beer/{beer_id}', 'BeerPageController@postBeerInfo');


    Route::get('brewer', 'BrewerPageController@get')->name('brewer');
    Route::get('brewer/{brewer_id}', 'BrewerPageController@showBrewerBeer')->name('brewerBeer');

    Route::post('brewer', 'BrewerPageController@post');
    Route::post('brewer/{brewer_id}', 'BrewerPageController@postShowBrewerBeer');

});
