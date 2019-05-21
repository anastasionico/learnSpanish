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
Route::get('/pricing', function () {
    return view('pricing');
});


Auth::routes();


Route::prefix('admin')->group(function () {
	Route::get('login', function () {
	    return view('admin/login');
	});
	Route::get('index', function () {
	    return view('admin/index');
	});

	
	Route::resource('users','UsersController');
	// Route::get('/users', 'UsersController@index');
	// Route::get('/users/{user}/edit', 'UsersController@edit');
    
});
// Route::get('/home', 'HomeController@index')->name('home');
