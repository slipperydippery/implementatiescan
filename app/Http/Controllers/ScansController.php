<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\User;
use App\Thema;
use App\Video;
use App\Answer;
use App\Instantie;
use App\Scanmodel;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ScansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scan = Scan::findOrFail(2);
        $scans = Scan::get();
        return view ('scans.index', compact ('scans', 'scan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scan = Scan::findOrFail(1);
        $videolist = Video::lists('title', 'id');
        $scanmodels = Scanmodel::findOrFail(1)->instantiemodels->lists('title', 'id');
        // return ($scanmodels);
        return view ('scans.create', compact('scanmodels', 'scan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scan = new Scan($request->all());
        if (! User::where('email', '=', $request->beheerder_email)->get()->count())
        {
            $user = new User();
            $user->email = $request->beheerder_email;
            $user->save();
        }
        $user = User::where('email', '=', $request->beheerder_email)->first();
        $user->beheert()->save($scan);
        $user->scans()->save($scan);
        // $scan->beheerder()->save($user);
        $scan->save();
        foreach($scan->scanmodel->instantiemodels as $instantiemodel)
        {
            $instantie = new Instantie();
            $instantie->title = $instantiemodel->title;
            $instantie->blurb = $instantiemodel->blurb;
            $instantie->scan_id = $scan->id;
            $instantiemodel->instanties()->save($instantie);
            $instantie->save();

            if($instantiemodel->id == $request->instantie)
            {
                $user->instanties()->save($instantie);
            }
        }
        return Redirect::route('scans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {
        $users = User::get();
        return view ('scans.show', compact('scan', 'users'));
    }

    public function director(Scan $scan, $thema_nr, $question_nr)
    {
        
        $thema = $scan->scanmodel->themas->get($thema_nr - 1);
        if ($question_nr == 0)
        {
            return view ('scans.themaintro', compact('scan', 'thema', 'thema_nr', 'question_nr'));
        }
        else if ($question_nr == (count($thema->questions) + 1))
        {
            return view ('scans.themaresultaat', compact('scan', 'thema', 'thema_nr', 'question_nr'));
        }
        else if ($question_nr > (count($thema->questions) + 1))
        {
            if($thema_nr == count($scan->scanmodel->themas))
            {
                return redirect('scans/' . $scan->id . '/actieoverzicht');
            }

            $thema = $scan->scanmodel->themas->get($thema_nr);
            $thema_nr++;
            return redirect('scans/' . $scan->id . '/thema/' . $thema_nr . '/vraag/0' );
        }
        else
        {
            $question = $thema->questions->get($question_nr - 1);
            return view ('scans.question', compact('scan', 'thema', 'question', 'thema_nr', 'question_nr'));
        }
    }

    public function intro(Scan $scan)
    {
        Auth::loginUsingId(1);
        $video = $scan->scanmodel->video;
        return view ('scans.intro', compact('video', 'scan'));
    }

    public function kennismaken(Scan $scan)
    {
        $instantieoptions = [];
        foreach($scan->instanties as $instantie)
        {
            if(count($instantie->users) < 2)
            {
                $instantieoptions[$instantie->id] = $instantie->title ;
            }
        }        
        return view ('scans.kennismaken', compact('scan', 'instantieoptions'));
    }

    public function removeuser(Scan $scan, User $user)
    {
        // return $user->id;
        $scan->participants()->detach($user->id);
        $instantie = $user->instanties->intersect($scan->instanties)->first();
        // return $instantie->first()->id;
        $user->instanties()->detach($instantie->id);
        return redirect()->back();
    }

    public function algemeenbeeld(Scan $scan)
    {
        return view ('scans.algemeenbeeld', compact('scan'));
    }

    public function store_algemeenbeeld(Scan $scan, Request $request)
    {
        $user = Auth::user();
        if(count($user->answers->intersect($scan->answers)) > 0) 
        {
            $answer = $user->answers->intersect($scan->answers)->first();
        } else {
            $answer = new Answer();
        }
        $answer->user_id = $user->id;
        $answer->value = $request->value;
        $scan->answers()->save($answer);
        return Redirect::route('scans.algemeenbeeldresultaat', compact('scan'));
    }

    public function algemeenbeeldresultaat(Scan $scan)
    {

        return view ('scans.algemeenbeeldresultaat', compact('scan'));
    }

    public function actieoverzicht(Scan $scan)
    {
        return view ('scans.actieoverzicht', compact('scan'));
    }

    public function actiesmailen(Scan $scan)
    {
        return view ('scans.actiesmailen', compact('scan'));
    }

    public function verbeteracties_bedankt(Scan $scan)
    {
        return view('pages.voorzitter.verbeteracties_bedankt', compact('scan'));

    }

    public function werkagenda(Scan $scan)
    {
        return view('pages.voorzitter.werkagenda', compact('scan'));
    }

    public function werkagendamailen(Scan $scan)
    {
        return view('scans.werkagendamailen', compact('scan'));
    }

    public function inlog_voorzitter(Scan $scan)
    {
        $scan = Scan::findOrFail(2);
        return view ('pages.voorzitter.inlog_voorzitter', compact('scan'));
    }

    public function invoerendeelnemers(Scan $scan)
    {
        Auth::loginUsingId(1);
        $instantieoptions = [];
        foreach($scan->instanties as $instantie)
        {
            if(count($instantie->users) < 2)
            {
                $instantieoptions[$instantie->id] = $instantie->title ;
            }
        }
        // return $instantieoptions;
        return view ('scans.inrichten.invoerendeelnemers', compact('scan', 'instantieoptions'));
    }

    public function storedeelnemer(Scan $scan, Request $request)
    {
        if (! User::where('email', '=', $request->email)->get()->count())
        {
            $user = new User($request->all());
            $user->initial_pwd = str_random(8);
            $user->password = Hash::make($user->initial_pwd);
            $user->save();
        }        
        $user = User::where('email', '=', $request->email)->first();
        $user->scans()->save($scan);
        $instantie = Instantie::findOrFail($request->instantie);
        $instantie->users()->save($user);

        return Redirect::back();    
    }

    public function controlerendeelnemers(Scan $scan)
    {
        return view ('scans.inrichten.controlerendeelnemers', compact('scan'));
    }

    public function uitnodigendeelnemers(Scan $scan)
    {
        return view ('scans.inrichten.uitnodigendeelnemers', compact('scan'));
    }

    public function addparticipant(Request $request, Scan $scan)
    {
        if (! User::where('email', '=', $request->email)->get()->count())
        {
            $user = new User($request->all());
            $user->initial_pwd = str_random(8);
            $user->password = Hash::make($user->initial_pwd);
            $user->save();
        }        
        $user = User::where('email', '=', $request->email)->first();
        $user->scans()->save($scan);
        $instantie = Instantie::findOrFail($request->instantie);
        $instantie->users()->save($user);

        /**
         * Send email
         */

        return Redirect::back(); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
