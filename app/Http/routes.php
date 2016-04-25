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

Route::get('/databank', ['as' => 'databank', 'uses' => 'PagesController@databank']);
Route::get('/testpage', ['as' => 'testpage', 'uses' => 'PagesController@testpage']);


Route::get('/inlog_voorzitter', function () {
    return view('pages.voorzitter.inlog_voorzitter');
});

Route::get('/regio_gemeente', function () {
    return view('pages.voorzitter.regio_gemeente');
});

Route::get('/deelnemers_overzicht', function () {
    return view('pages.voorzitter.deelnemers_overzicht');
});

Route::get('/deelnemers_uitnodigen', function () {
    return view('pages.voorzitter.deelnemers_uitnodigen');
});

Route::get('/evenement_beheren', function () {
    return view('pages.voorzitter.evenement_beheren');
});




Route::get('regio', function () {
    return view('pages.regio');
});

Route::get('/metwie', function (){
	return view('pages.metwie');
});

Route::get('/wacht_pre_algemeen', function (){
	return view('pages.wacht_pre_algemeen');
});

Route::get('/algemeenbeeld_participant', function (){
	return view('pages.algemeenbeeld_participant');
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

Route::get('/werkagenda', function (){
	return view('pages.voorzitter.werkagenda');
});

Route::get('/bedankt', function (){
	return view('pages.voorzitter.bedankt');
});

Route::get('/verbeteracties_mailen', function (){
	return view('pages.voorzitter.verbeteracties_mailen');
});

Route::get('/verbeteracties_bedankt', function (){
	return view('pages.voorzitter.verbeteracties_bedankt');
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
