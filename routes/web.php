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

// Route::get('/', 'HomeController@home_page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// posts
Route::post('/add_status', 'postController@insert_posts')->name('add_status');
Route::get('/get_status', 'postController@get_posts')->name('get_status');

// users
Route::get('/get_users', 'postController@get_users')->name('get_users');

// follower
Route::post('/follow', 'followerController@add_follower')->name('follow');