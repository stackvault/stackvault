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
    return view('dashboard');
});

Route::resource('/pagespeed', 'PageSpeedController');
Route::post('/pagespeed/validate', 'PageSpeedController@validateUrl');
Route::get('/pagespeed/faq', function () {
    return view('pagespeed.faq');
});