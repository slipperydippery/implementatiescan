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

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
    Route::get('/api/scanmodel/thema', 'ApiController@indexscanmodelthema');
    
    Route::get('/qanda', ['as' => 'qanda', 'uses' => 'PagesController@qanda']);
    Route::get('/databank', ['as' => 'databank', 'uses' => 'InstrumentsController@index']);
    Route::get('/api/instruments', 'ApiController@getInstruments');

    Route::get('/api/programma', 'ApiController@getProgrammas');
    Route::get('/api/praktijkvoorbeeld', 'ApiController@getPraktijkvoorbeelds');
    Route::get('/api/pdfs', 'ApiController@getPdfs');
    Route::get('/api/links', 'ApiController@getLinks');

    Route::get('/users/request', ['as' => 'users.request', 'uses' => 'UsersController@request']);
    Route::post('/users/request', ['as' => 'users.sendrequest', 'uses' => 'EmailController@sendrequest']);
    Route::get('/users/requestthank', ['as' => 'users.requestthank', 'uses' => 'EmailController@requestthank']);

});

Route::group(['middleware' => ['web', 'auth']], function () {

    /**
     * User
     */
    Route::get('/password/change', ['as' => 'password.change', 'uses' => 'UsersController@password']);

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

    Route::get('/api/scan/{scan}/participant', 'ApiController@indexscanparticipant');
    Route::get('/api/scan/{scan}/participant/{user}', 'ApiController@getparticipant');
    Route::post('/api/scan/{scan}/participant/', 'ApiController@savenewparticipant');
    Route::put('/api/scan/{scan}/participant/{user}', 'ApiController@updateparticipant');
    Route::delete('/api/scan/{scan}/participant/{user}', 'ApiController@removeparticipant');

    Route::get('/api/verbeteractie/{verbeteractie}/externaluser', 'ApiController@indexexternaluser');
    Route::post('/api/verbeteractie/{verbeteractie}/externaluser', 'ApiController@savenewexternaluser');
    Route::delete('/api/verbeteractie/{verbeteractie}/externaluser/{externaluser}', 'ApiController@removeexternaluser');

    Route::get('/api/verbeteractie/{verbeteractie}/subactie', 'ApiController@indexsubactie');
    Route::get('/api/verbeteractie/{verbeteractie}/newsubactie', 'ApiController@savenewsubactie');
    Route::get('/api/subactie/{subactie}/delete', 'ApiController@deletesubactie');
    Route::get('/api/subactie/{subactie}/betrokkene', 'ApiController@indexsubbetrokkene');
    Route::get('/api/subactie/{subactie}/unbetrokkene', 'ApiController@indexsubunbetrokkene');
    Route::post('/api/subactie/{subactie}/betrokkene/{user}', 'ApiController@addsubbetrokkene');
    Route::delete('/api/subactie/{subactie}/betrokkene/{user}', 'ApiController@removesubbetrokkene');
    Route::put('/api/subactie/{subactie}', 'ApiController@updatesubactie');
    Route::get('/api/subactie/{subactie}/externaluser', 'ApiController@indexsubexternaluser');
    Route::post('/api/subactie/{subactie}/externaluser', 'ApiController@savenewsubexternaluser');
    Route::delete('/api/subactie/{subactie}/subexternaluser/{subexternaluser}', 'ApiController@removesubexternaluser');

    Route::get('/api/scan/{scan}/instantie', 'ApiController@indexinstantie');

    Route::get('/api/scan/{scan}/participantsininstantie', 'ApiController@participantsininstantie');
    Route::get('/api/scan/{scan}/thema/{thema}/getThemaOverzichtValues', 'ApiController@getThemaOverzichtValues');

    Route::get('/api/scan/{scan}/thema/{thema_id}/themaanswered', 'ApiController@themaanswered');
    Route::get('/api/scan/{scan}/thema/{thema_id}/user/{user}/slidervalue', 'ApiController@slidervalue');
    Route::patch('/api/scan/{scan}/thema/{thema_id}/user/{user}/setslidervalue', 'ApiController@setslidervalue');
    Route::get('/api/scan/{scan}/thema/{thema}/getParticipantABValues', 'ApiController@getParticipantABValues');
    Route::get('/api/scan/{scan}/thema/{thema}/getNrUnanswered', 'ApiController@getNrUnanswered');
    Route::get('/api/scan/{scan}/thema/{thema}/getNrIncomplete', 'ApiController@getNrIncomplete');
    Route::get('/api/scan/{scan}/thema/{thema}/getWhoIncomplete', 'ApiController@getWhoIncomplete');
    Route::get('/api/scan/{scan}/participants', 'ApiController@participants');

    Route::get('/api/instantiesveld', 'ApiController@instantiesveld');
    Route::get('/api/criteria', 'ApiController@criteria');
    Route::get('/api/scan', 'ApiController@indexscan');
    Route::put('/api/scan/{scan}', 'ApiController@updatescan');
    Route::get('/api/user', 'ApiController@indexuser');


    /**
     * Themas
     */
    Route::get('/themas/{thema}/video', ['as' => 'themas.video', 'uses' => 'ThemasController@video']);
    Route::post('/themas/{thema}/video', ['as' => 'themas.updatevideo', 'uses' => 'ThemasController@updatevideo']);

    /**
     *  Beheerder
     */
    
    Route::post('/scans/{scan}', ['as' => 'scans.addparticipant', 'uses' => 'ScansController@addparticipant']);

    /**
     * Admin
     */
    Route::get('/admin/scanrequests', ['as' => 'admin.scanrequests', 'uses' => 'AdminController@scanrequests']);
    Route::get('/scans/{scan}/video', ['as' => 'scans.video', 'uses' => 'ScansController@video' ]);
    Route::post('scans/{scan}/video', ['as' => 'scans.updatevideo', 'uses' => 'ScansController@updatevideo']);

    Route::get('admin/loginasuser/{user}', 'AdminController@loginasuser');

    Route::put('api/updateActie/', 'WerkagendasController@updateActie');

    Route::resource('scans', 'ScansController');
    Route::resource('themas', 'ThemasController');
    Route::resource('videos', 'VideosController');
    Route::resource('scanmodels', 'ScanmodelsController');
    Route::resource('users', 'UsersController');
    Route::resource('consultants', 'ConsultantsController');


    Route::post('/users/{user}/changepassword', ['as' => 'users.changepassword', 'uses' => 'UsersController@changepassword']);
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
    Route::post('/scans/{scan}/actiesbevesitigen', ['as' => 'scans.actiesbevesitigen', 'uses' => 'ScansController@actiesbevesitigen']);
    Route::get('/scans/{scan}/actiesmailen', ['as' => 'scans.actiesmailen', 'uses' => 'ScansController@actiesmailen']);
    Route::post('/send/verzendacties/scan/{scan}', ['as' => 'email.verzendacties', 'uses' => 'EmailController@verzendacties']); 
    Route::get('scans/{scan}/verbeteracties_bedankt', ['as' => 'scans.verbeteracties_bedankt', 'uses' => 'ScansController@verbeteracties_bedankt']);
    Route::post('/send/verzendwerkagenda/scan/{scan}', ['as' => 'email.verzendwerkagenda', 'uses' => 'EmailController@verzendwerkagenda']);

    Route::get('scans/{scan}/werkagenda', ['as' => 'scans.werkagenda', 'uses' => 'ScansController@werkagenda']);
    Route::get('scans/{scan}/werkagendamailen', ['as' => 'scans.werkagendamailen', 'uses' => 'ScansController@werkagendamailen']);

    Route::post('scans/{scan}/actieoverzicht', ['as' => 'werkagendas.store_changes', 'uses' => 'WerkagendasController@store_changes']);




    /**
     * Scan inrichten
     */
    Route::get('/inrichten/overzichtscans', ['as' => 'scans.inrichten.overzichtscans', 'uses' => 'InrichtenController@overzichtscans']);
    Route::get('/scans/{scan}/inrichten/instructiefilm', ['as' => 'scans.inrichten.instructiefilm', 'uses' => 'InrichtenController@instructiefilm']);
    Route::get('/scans/{scan}/inrichten/invoerendeelnemers', ['as' => 'scans.inrichten.invoerendeelnemers', 'uses' => 'InrichtenController@invoerendeelnemers']);
    Route::get('/scans/{scan}/inrichten/editinvoerdeelnemer/{user}', ['as' => 'scans.inrichten.editinvoerdeelnemer', 'uses' => 'InrichtenController@editinvoerdeelnemer']);
    Route::post('/scans/{scan}/inrichten/invoerendeelnemers', ['as' => 'scans.inrichten.storedeelnemer', 'uses' => 'InrichtenController@storedeelnemer']);
    Route::get('/scans/{scan}/inrichten/controlerendeelnemers', ['as' => 'scans.inrichten.controlerendeelnemers', 'uses' => 'InrichtenController@controlerendeelnemers']);
    Route::get('/scans/{scan}/inrichten/uitnodigendeelnemers', ['as' => 'scans.inrichten.uitnodigendeelnemers', 'uses' => 'InrichtenController@uitnodigendeelnemers']);
    Route::post('/send/senduitnodiging/scan/{scan}', ['as' => 'senduitnodiging', 'uses' => 'EmailController@senduitnodiging']);
    Route::post('/scans/{scan}/inrichten/uitnodigendeelnemers', ['as' => 'scans.inrichten.post_uitnodigendeelnemers', 'uses' => 'InrichtenController@post_uitnodigendeelnemers']);
    Route::get('/scans/{scan}/inrichten/mailverstuurd', ['as' => 'scans.inrichten.mailverstuurd', 'uses' => 'InrichtenController@mailverstuurd']);
    Route::get('/bedankt', ['as' => 'bedankt', 'uses' => 'PagesController@bedankt']);

    /**
     * Kennisbank
     */
    Route::resource('instruments', 'InstrumentsController');
    Route::resource('programmas', 'ProgrammasController');
    Route::resource('praktijkvoorbeelds', 'PraktijkvoorbeeldsController');
    Route::resource('pdfs', 'PdfsController');

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

