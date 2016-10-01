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

Route::post('/send', 'EmailController@send');
Route::post('/send/senduitnodiging/scan/{scan}', ['as' => 'senduitnodiging', 'uses' => 'EmailController@senduitnodiging']);

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
    Route::get('/databank', ['as' => 'databank', 'uses' => 'InstrumentsController@index']);
    Route::get('/api/scanmodel/thema', 'ApiController@indexscanmodelthema');
    Route::get('/api/instruments', 'ApiController@getInstruments');
    Route::get('/api/programma', 'ApiController@getProgrammas');
    Route::get('/api/praktijkvoorbeeld', 'ApiController@getPraktijkvoorbeelds');

});

Route::group(['middleware' => ['web', 'auth']], function () {
/**
     * API Calls
     */
    Route::get('/api/scan/{scan}/thema', 'ApiController@indexthema');

    Route::get('/api/thema/{thema}/question', 'ApiController@indexthemaquestion');
    Route::get('/api/scan/{scan}/thema/{thema}/verbeteractie', 'ApiController@indexscanthemaverbeteractie');
    Route::put('/api/verbeteractie/{verbeteractie}', 'ApiController@updateverbeteractie');
    Route::post('/api/verbeteractie/{verbeteractie}/setactive', 'ApiController@setactieactive');

    Route::get('/api/verbeteractie/{verbeteractie}/betrokkene', 'ApiController@indexbetrokkene');
    Route::post('/api/verbeteractie/{verbeteractie}/betrokkene/{user}', 'ApiController@addbetrokkene');
    Route::delete('/api/verbeteractie/{verbeteractie}/betrokkene/{user}', 'ApiController@removebetrokkene');

    Route::get('/api/scan/{scan}/participant', 'ApiController@indexparticipant');
    Route::get('/api/scan/{scan}/participant/{user}', 'ApiController@getparticipant');
    Route::post('/api/scan/{scan}/participant/', 'ApiController@savenewparticipant');
    Route::put('/api/scan/{scan}/participant/{user}', 'ApiController@updateparticipant');
    Route::delete('/api/scan/{scan}/participant/{user}', 'ApiController@removeparticipant');

    Route::get('/api/scan/{scan}/instantie', 'ApiController@indexinstantie');

    Route::get('/api/scan/{scan}/participantsininstantie', 'ApiController@participantsininstantie');
    Route::get('/api/scan/{scan}/thema/{thema}/getThemaOverzichtValues', 'ApiController@getThemaOverzichtValues');

    Route::get('/api/scan/{scan}/thema/{thema_id}/themaanswered', 'ApiController@themaanswered');
    Route::get('/api/scan/{scan}/thema/{thema_id}/user/{user}/slidervalue', 'ApiController@slidervalue');
    // Route::get('/api/verbeteracties/{id}', ['as' => 'temper', 'uses' => 'ApiController@verbeteracties']);
    Route::patch('/api/scan/{scan}/thema/{thema_id}/user/{user}/setslidervalue', 'ApiController@setslidervalue');
    Route::get('/api/scan/{scan}/thema/{thema}/getParticipantABValues', 'ApiController@getParticipantABValues');
    Route::get('/api/scan/{scan}/thema/{thema}/getNrUnanswered', 'ApiController@getNrUnanswered');
    Route::get('/api/scan/{scan}/thema/{thema}/getNrIncomplete', 'ApiController@getNrIncomplete');
    Route::get('/api/scan/{scan}/participants', 'ApiController@participants');


    /**
     * Themas
     */
    Route::get('/themas/{thema}/video', ['as' => 'themas.video', 'uses' => 'ThemasController@video']);
    Route::post('/themas/{thema}/video', ['as' => 'themas.updatevideo', 'uses' => 'ThemasController@updatevideo']);

    /**
     * Instruments
     */
    Route::resource('instruments', 'InstrumentsController');
    Route::resource('programmas', 'ProgrammasController');
    Route::resource('praktijkvoorbeelds', 'PraktijkvoorbeeldsController');

    /**
     *  Beheerder
     */
    
    Route::post('/scans/{scan}', ['as' => 'scans.addparticipant', 'uses' => 'ScansController@addparticipant']);
    Route::get('/scans/{scan}/video', ['as' => 'scans.video', 'uses' => 'ScansController@video' ]);
    Route::post('scans/{scan}/video', ['as' => 'scans.updatevideo', 'uses' => 'ScansController@updatevideo']);

    Route::get('admin/loginasuser/{user}', 'AdminController@loginasuser');

    Route::put('api/updateActie/', 'WerkagendasController@updateActie');

    Route::resource('scans', 'ScansController');
    Route::resource('themas', 'ThemasController');
    Route::resource('videos', 'VideosController');
    Route::resource('scanmodels', 'ScanmodelsController');
    Route::resource('users', 'UsersController');
    Route::get('scans/{scan}/destroy', ['as' => 'scans.delete', 'uses' => 'ScansController@destroy']);
    Route::post('scans/{scan}/updatetitle', ['as' => 'scans.updatetitle', 'uses' => 'ScansController@updatetitle']);
    Route::post('scans/{scan}/updateregio', ['as' => 'scans.updateregio', 'uses' => 'ScansController@updateregio']);
    Route::post('scans/{scan}/updatebeheerder', ['as' => 'scans.updatebeheerder', 'uses' => 'ScansController@updatebeheerder']);
    Route::post('scans/{scan}/updateinstantie', ['as' => 'scans.updateinstantie', 'uses' => 'ScansController@updateinstantie']);
    // Route::get('/users/{user}/scan/{scan}/edituserinfo', ['as' => 'users.edituserinfo', 'uses' => 'UsersController@edituserinfo ']);
    Route::post('/users/{user}/scan/{scan}/edituserinfo', ['as' => 'users.edituserinfo', 'uses' => 'UsersController@edituserinfo']);
    Route::post('/users/{user}/editbaseuser', ['as' => 'users.editbaseuser', 'uses' => 'UsersController@editbaseuser']);

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
    Route::post('/scans/{scans}/thema/{thema_nr}/question/{question_nr}/{question}/', ['as' => 'scans.storequestion', 'uses' => 'ScansController@storequestion']);
    Route::get('/scans/{scans}/thema/{thema_nr}/vraag/{question_nr}', ['as' => 'scans.director', 'uses' => 'ScansController@director']);
    Route::get('/scans/{scans}/thema/{thema}/{thema_nr}/themaresultaat', ['as' => 'scans.themaresultaat', 'uses' => 'ScansController@themaresultaat']);
    Route::post('/scans/{scans}/thema/{thema}/', ['as' => 'scans.store_prebeteracties', 'uses' => 'ScansController@store_prebeteracties']);

    Route::get('/scans/{scan}/actieoverzicht', ['as' => 'scans.actieoverzicht', 'uses' => 'ScansController@actieoverzicht']);
    Route::post('/scans/{scan}/actieoverzicht', ['as' => 'scans.post_verbeteracties', 'uses' => 'ScansController@post_verbeteracties']);
    Route::post('/scans/{scan}/actiesmailen', ['as' => 'scans.actiesmailen', 'uses' => 'ScansController@actiesmailen']);
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

