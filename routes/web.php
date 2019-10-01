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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');


Route::group(['prefix' => 'playlist'], function(){
    Route::post('search', 'PlaylistController@search')->name('search');
    Route::post('/song/add', 'PlaylistController@addSong')->name('add.song');
});
