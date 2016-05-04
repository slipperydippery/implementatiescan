<?php
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

    Route::resource('scans', 'ScansController');
    // Route::resource('scans.themas', 'ScanThemasController');
    // Route::resource('scans.themas.questions', 'ScanThemaQuestionsController');
    Route::resource('themas', 'ThemasController');
    Route::resource('videos', 'VideosController');
    Route::resource('scanmodels', 'ScanmodelsController');
    Route::resource('users', 'UsersController');
    // Route::get('/users/{user}/scan/{scan}/edituserinfo', ['as' => 'users.edituserinfo', 'uses' => 'UsersController@edituserinfo ']);
    Route::post('/users/{user}/scan/{scan}/edituserinfo', ['as' => 'users.saveuserinfo', 'uses' => 'UsersController@saveuserinfo']);

    // Route::post('/scans/addthema', ['as' => 'scans.addthemas', 'uses' => 'ScansController@addthema']);
    Route::post('/scanmodels/addthema', ['as' => 'scanmodels.addthemas', 'uses' => 'ScanmodelsController@addthema']);

	Route::get('/scans/{scans}/intro', ['as' => 'scans.intro', 'uses' => 'ScansController@intro']);
    Route::get('/scans/{scans}/kennismaken', ['as' => 'scans.kennismaken', 'uses' => 'ScansController@kennismaken']);
    Route::get('/scans/{scans}/algemeenbeeld', ['as' => 'scans.algemeenbeeld', 'uses' => 'ScansController@algemeenbeeld']);
    Route::post('/scans/{scans}/algemeenbeeld', ['as' => 'scans.store_algemeenbeeld', 'uses' => 'ScansController@store_algemeenbeeld']);
    Route::get('/scans/{scans}/algemeenbeeldresultaat', ['as' => 'scans.algemeenbeeldresultaat', 'uses' => 'ScansController@algemeenbeeldresultaat']);
    Route::get('/scans/{scans}/thema/{thema_nr}/vraag/{question_nr}', ['as' => 'scans.director', 'uses' => 'ScansController@director']);
    Route::get('/scans/{scan}/actieoverzicht', ['as' => 'scans.actieoverzicht', 'uses' => 'ScansController@actieoverzicht']);
    Route::get('/scans/{scan}/actiesmailen', ['as' => 'scans.actiesmailen', 'uses' => 'ScansController@actiesmailen']);



Route::get('/testpage', ['as' => 'testpage', 'uses' => 'PagesController@testpage']);
Route::get('/foundation', ['as' => 'foundation', 'uses' => 'PagesController@foundation']);

});






Route::get('/', function () {
    return view('welcome');
});

Route::get('/databank', ['as' => 'databank', 'uses' => 'PagesController@databank']);




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
