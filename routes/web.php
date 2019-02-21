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
    return view('home');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/start-quiz', function () {
    return view('start-quiz');
});
Route::get('/quiz', function () {
    return view('quiz');
});

Route::get('/admin/login', function () {
    return view('admin/login');
});
Route::get('/admin/index', function () {
    return view('admin/index');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
