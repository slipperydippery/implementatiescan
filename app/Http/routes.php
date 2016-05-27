<?php

use App\Scan;
use App\User;
use App\Thema;
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
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
    Route::get('/databank', ['as' => 'databank', 'uses' => 'PagesController@databank']);

});

Route::group(['middleware' => ['web', 'auth']], function () {
    /**
     * API Calls
     */
    Route::get('/api/scan/{scan}/participants', function(Scan $scan) { return Scan::where('id', '=', '2')->with('participants')->with('instanties')->get(); } );
    Route::get('/api/scan/{scan}/participantsininstantie', 'ApiController@participantsininstantie');
    Route::get('/api/scan/{scan}/thema/{thema_id}/themaanswered', 'ApiController@themaanswered');
    Route::get('/api/scan/{scan}/thema/{thema_id}/user/{user}/slidervalue', 'ApiController@slidervalue');
    Route::get('/api/verbeteracties/{id}', ['as' => 'temper', 'uses' => 'WerkagendasController@verbeteracties']);
    Route::patch('/api/scan/{scan}/thema/{thema_id}/user/{user}/setslidervalue', 'ApiController@setslidervalue');
    Route::get('/api/scan/{scan}/thema/{thema}/getParticipantABValues', 'ApiController@getParticipantABValues');
    Route::get('/api/scan/{scan}/participants', 'ApiController@participants');

    /**
     *  Beheerder
     */
    Route::put('api/updateActie/', 'WerkagendasController@updateActie');

    Route::resource('scans', 'ScansController');
    Route::resource('themas', 'ThemasController');
    Route::resource('videos', 'VideosController');
    Route::resource('scanmodels', 'ScanmodelsController');
    Route::resource('users', 'UsersController');
    // Route::get('/users/{user}/scan/{scan}/edituserinfo', ['as' => 'users.edituserinfo', 'uses' => 'UsersController@edituserinfo ']);
    Route::post('/users/{user}/scan/{scan}/edituserinfo', ['as' => 'users.saveuserinfo', 'uses' => 'UsersController@saveuserinfo']);
    Route::post('/scans/{scan}', ['as' => 'scans.addparticipant', 'uses' => 'ScansController@addparticipant']);

    // Route::post('/scans/addthema', ['as' => 'scans.addthemas', 'uses' => 'ScansController@addthema']);
    Route::post('/scanmodels/addthema', ['as' => 'scanmodels.addthemas', 'uses' => 'ScanmodelsController@addthema']);

    /**
     * Scan Deelnemen
     */
    Route::get('/scans/start/router', ['as' => 'scans.start', 'uses' => 'ScansController@start']);
    Route::get('/scans/start/userscans', ['as' => 'scans.userscans', 'uses' => 'ScansController@userscans']);
    Route::get('/scans/{scans}/intro', ['as' => 'scans.intro', 'uses' => 'ScansController@intro']);
    Route::get('/scans/{scans}/kennismaken', ['as' => 'scans.kennismaken', 'uses' => 'ScansController@kennismaken']);
    Route::get('/scans/{scan}/removeuser/{user}', ['as' => 'scans.removeuser', 'uses' => 'ScansController@removeuser']);
    Route::get('/scans/{scans}/algemeenbeeld', ['as' => 'scans.algemeenbeeld', 'uses' => 'ScansController@algemeenbeeld']);
    Route::post('/scans/{scans}/algemeenbeeld', ['as' => 'scans.store_algemeenbeeld', 'uses' => 'ScansController@store_algemeenbeeld']);
    Route::get('/scans/{scans}/algemeenbeeldresultaat', ['as' => 'scans.algemeenbeeldresultaat', 'uses' => 'ScansController@algemeenbeeldresultaat']);
    Route::get('/scans/{scans}/thema/{thema_nr}/vraag/{question_nr}', ['as' => 'scans.director', 'uses' => 'ScansController@director']);
    Route::post('/scans/{scans}/thema/{thema}/', ['as' => 'scans.store_prebeteracties', 'uses' => 'ScansController@store_prebeteracties']);

    Route::get('/scans/{scan}/actieoverzicht', ['as' => 'scans.actieoverzicht', 'uses' => 'ScansController@actieoverzicht']);
    Route::post('/scans/{scan}/actieoverzicht', ['as' => 'scans.post_verbeteracties', 'uses' => 'ScansController@post_verbeteracties']);
    Route::get('/scans/{scan}/actiesmailen', ['as' => 'scans.actiesmailen', 'uses' => 'ScansController@actiesmailen']);
    Route::get('scans/{scan}/verbeteracties_bedankt', ['as' => 'scans.verbeteracties_bedankt', 'uses' => 'ScansController@verbeteracties_bedankt']);

    Route::get('scans/{scan}/werkagenda', ['as' => 'scans.werkagenda', 'uses' => 'ScansController@werkagenda']);
    Route::get('scans/{scan}/werkagendamailen', ['as' => 'scans.werkagendamailen', 'uses' => 'ScansController@werkagendamailen']);

    Route::post('scans/{scan}/actieoverzicht', ['as' => 'werkagendas.store_changes', 'uses' => 'WerkagendasController@store_changes']);



    /**
     * Scan inrichten
     */
    Route::get('/voorzitter/scans', ['as' => 'voorzitter.scans', 'uses' => 'ScansController@voorzitterscans']);
    
    Route::get('/scans/{scan}/inrichten/invoerendeelnemers', ['as' => 'scans.invoerendeelnemers', 'uses' => 'ScansController@invoerendeelnemers']);
    Route::get('/scans/{scan}/inrichten/editinvoerdeelnemer/{user}', ['as' => 'scans.editinvoerdeelnemer', 'uses' => 'ScansController@editinvoerdeelnemer']);
    Route::post('/scans/{scan}/inrichten/invoerendeelnemers', ['as' => 'scans.storedeelnemer', 'uses' => 'ScansController@storedeelnemer']);
    Route::get('/scans/{scan}/inrichten/controlerendeelnemers', ['as' => 'scans.controlerendeelnemers', 'uses' => 'ScansController@controlerendeelnemers']);
    Route::get('/scans/{scan}/inrichten/uitnodigendeelnemers', ['as' => 'scans.uitnodigendeelnemers', 'uses' => 'ScansController@uitnodigendeelnemers']);
    Route::post('/scans/{scan}/inrichten/uitnodigendeelnemers', ['as' => 'scans.post_uitnodigendeelnemers', 'uses' => 'ScansController@post_uitnodigendeelnemers']);
    Route::get('/bedankt', ['as' => 'bedankt', 'uses' => 'PagesController@bedankt']);

});

Route::get('/testpage', ['as' => 'testpage', 'uses' => 'PagesController@testpage']);
Route::get('/getRequest', function()
{
    if(Request::ajax())
    {
        return 'getRequest has loaded completely.';
    }
});

Route::get('/foundation', ['as' => 'foundation', 'uses' => 'PagesController@foundation']);

