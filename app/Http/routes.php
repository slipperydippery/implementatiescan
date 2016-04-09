<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', function () {
    return view('welcome');
});


Route::get('regio', function () {
    return view('pages.regio');
});

Route::get('/metwie', function (){
	return view('pages.metwie');
});

Route::get('/intro', function (){
	return view('pages.voorzitter.intro');
});

Route::get('/wie', function (){
	return view('pages.voorzitter.wie');
});

Route::get('/algemeenbeeld', function (){
	return view('pages.voorzitter.algemeenbeeld');
});

Route::get('/algemeenbeeldresultaat', function (){
	return view('pages.voorzitter.algemeenbeeldresultaat');
});

Route::get('/thema1', function (){
	return view('pages.voorzitter.thema1');
});

Route::get('/thema1vraag1', function (){
	return view('pages.voorzitter.thema1vraag1');
});

Route::get('/thema1vraag2', function (){
	return view('pages.voorzitter.thema1vraag2');
});

Route::get('/thema1vraag3', function (){
	return view('pages.voorzitter.thema1vraag3');
});

Route::get('/thema1vraag4', function (){
	return view('pages.voorzitter.thema1vraag4');
});

Route::get('/thema1vraag5', function (){
	return view('pages.voorzitter.thema1vraag5');
});

Route::get('/thema1resultaat', function (){
	return view('pages.voorzitter.thema1resultaat');
});

Route::get('/actieoverzicht', function (){
	return view('pages.voorzitter.actieoverzicht');
});



Route::get('/waar', function (){
	return view('pages.waar');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
