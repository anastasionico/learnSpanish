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


Route::get("/profile", "ProfilesController@edit");
Route::patch("profile/{user}", "ProfilesController@update");
Route::get("editpassword", "ProfilesController@editpassword");
Route::patch("updatepassword", "ProfilesController@updatepassword");

// Stripe payment
Route::get('showplan/{plan}', 'PlansController@show');
Route::get('swapplan/{plan}', 'PlansController@swap');

Route::post('subscription', 'SubscriptionsController@create');
Route::post('swapsubscription', 'SubscriptionsController@swap');
Route::post('cancelsubscription', 'SubscriptionsController@destroy');
Route::get('pricing', 'PlansController@pricing');

Auth::routes();

Route::get("start-quiz", "QuizController@start");
Route::get("quiz", "QuizController@quiz");
Route::post("valuateAnswer", "QuizController@valuateAnswer");

Route::post('messages/add', 'MessagesController@store');
	
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('login', function () {
	    return view('admin/login');
	});
	Route::get('index', function () {
	    return view('admin/index');
	});

	
	Route::resource('users','UsersController');
	Route::get("users/{user}/conjugationchart", "UsersController@conjugationChart");
	
	Route::resource('verbs','VerbsController');
	Route::get("verbs/{verb}/tenses/create", "TensesController@create");
	Route::get("verbs/{verb}/tenses/{tense}/edit", "TensesController@edit");
	Route::get("verbs/{verb}/tenses/{tense}/conjugation/create", "ConjugationsController@create");
	Route::get('verb/exportcsv', 'VerbsController@exportCsv');

	Route::resource('tenses','TensesController');
	Route::resource('conjugation','ConjugationsController');
	Route::get('conjugation/setRegularity/{conjugation}','ConjugationsController@setRegularity');
	Route::get('conjugation/setAvailability/{conjugation}','ConjugationsController@setAvailability');
	Route::get('conjugation/setFormat/{conjugation}/{format}','ConjugationsController@setFormat');
	Route::get('conjugation/setRegularityAll/{tense}/{status}','ConjugationsController@setRegularityAll');
	Route::get('conjugation/setAvailabilityAll/{tense}/{status}','ConjugationsController@setAvailabilityAll');
	Route::get('conjugation/setFormatAll/{tense}/{status}','ConjugationsController@setFormatAll');
	

	Route::get('plans', 'PlansController@index');
	Route::get('plans/create', 'PlansController@create');
	Route::post('plans', 'PlansController@store');
	Route::get('plans/{plan}/edit', 'PlansController@edit');
	Route::delete('plans/{plan}', 'PlansController@destroy');
	Route::patch('plans/{plan}', 'PlansController@update');
	
	Route::get('messages', 'MessagesController@index');
	Route::resource('messages','MessagesController');


	
});

