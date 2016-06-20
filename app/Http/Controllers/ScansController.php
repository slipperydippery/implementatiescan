<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\User;
use App\Thema;
use App\Video;
use App\Answer;
use JavaScript;
use App\Question;
use App\Instantie;
use App\Scanmodel;
use App\Http\Requests;
use App\Verbeteractie;
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
        $scans = Scan::get();
        return view ('scans.index', compact ('scans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scanmodels = Scanmodel::findOrFail(1)->instantiemodels->lists('title', 'id');
        return view ('scans.create', compact('scanmodels'));
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
        // ADD BEHEERDER, CREATE USER IF DOESN'T EXIST
        if (! User::where('email', '=', $request->beheerder_email)->get()->count())
        {
            $user = new User();
            $user->initial_pwd = str_random(8);
            $user->password = Hash::make($user->initial_pwd);
            $user->email = $request->beheerder_email;
            $user->save();
        }
        $user = User::where('email', '=', $request->beheerder_email)->first();
        $user->beheert()->save($scan);
        $user->scans()->save($scan);
        $scan->save();
        // CREATE INSTANTIES, CARBON COPY FROM INSTANTIEMODEL
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
        // CREATE VERBETERACTIES
        foreach($scan->scanmodel->themas as $thema)
        {
            foreach($thema->questions as $question)
            {
                $verbeteractie = new Verbeteractie();
                $verbeteractie->user_id = null;
                $verbeteractie->scan_id = $scan->id;
                $verbeteractie->question_id = $question->id;
                $verbeteractie->title = $question->title;
                $verbeteractie->thema_id = $thema->id;
                $verbeteractie->save();
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
        //Goto Intro
        if ($question_nr == 0)
        {
            return view ('scans.themaintro', compact('scan', 'thema', 'thema_nr', 'question_nr'));
        }
        //Goto Thema Resultaat
        else if ($question_nr == (count($thema->questions) + 1))
        {
            JavaScript::put([
                'scan' => $scan,
                'thema_id' => $thema->id,
                'thema_nr' => $thema_nr,
            ]);
            // return view ('scans.themaresultaat', compact('scan', 'thema', 'thema_nr', 'question_nr'));
            if(count(Auth::user()->beheert->intersect([$scan])))
            {
                return view('scans.prethemaresultaat', compact('scan', 'thema', 'thema_nr', 'question_nr'));
            } else {
                return view('scans.participantthemaresultaat', compact('scan', 'thema', 'thema_nr', 'question_nr'));
            }
        }
        //Goto next thema or verbeteracties
        else if ($question_nr > (count($thema->questions) + 1))
        {
            //Goto Actieoverzicht or Complete Thema
            if($thema_nr == count($scan->scanmodel->themas))
            {
                if(count(Auth::user()->beheert->intersect([$scan])))
                {
                    return redirect('scans/' . $scan->id . '/actieoverzicht');
                } else {
                    return view('scans.complete', compact('scan'));
                }
            }

            //Goto Next thema
            $thema = $scan->scanmodel->themas->get($thema_nr);
            $thema_nr++;
            return redirect('scans/' . $scan->id . '/thema/' . $thema_nr . '/vraag/0' );
        }
        //Goto thema question page
        else
        {
            $question = $thema->questions->get($question_nr - 1);
            return view ('scans.question', compact('scan', 'thema', 'question', 'thema_nr', 'question_nr'));
        }
    }

    public function themaresultaat(Scan $scan, Thema $thema, $thema_nr)
    {
        $themasaverage = [];
        foreach($thema->questions as $question)
        {
            $thisaverage = 0;
            foreach($scan->participants as $participant)
            {
                $thisaverage += $participant->answers->intersect($question->answers)->first()->value;
            }
            $thisaverage = $thisaverage / count($scan->participants);
            $themasaverage[$question->id] = $thisaverage;
        }
        return view ('scans.themaresultaat', compact('scan', 'thema', 'thema_nr', 'themasaverage'));
    }

    public function start()
    {
        $scans = Auth::user()->scans;
        if(count($scans) > 1)
        {
            return Redirect::route('scans.userscans');
        } elseif (count($scans) < 1) {
            return Redirect::route('home');
        }
        $scan = $scans->first();
        return Redirect::route('scans.intro', compact('scan'));

    }

    public function userscans()
    {
        $scans = Auth::user()->scans;
        return view('scans.userscans', compact('scans'));
    }

    public function intro(Scan $scan)
    {
        $video = $scan->scanmodel->video;
        return view ('scans.intro', compact('video', 'scan'));
    }

    public function kennismaken(Scan $scan)
    {
        JavaScript::put([
            'scan' => $scan,
        ]);
        
        $instantieoptions = [];
        foreach($scan->instanties as $instantie)
        {
            if(count($instantie->participants) < 2)
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

    public function storequestion(Request $request, Scan $scan, $thema_nr, $question_nr, Question $question)
    {
        $user = Auth::user();
        if(count($user->answers->intersect($question->answers)))
        {
            $answer = $user->answers->intersect($question->answers)->first();
        } else {
            $answer = new Answer();
        }
        $answer->user_id = $user->id;
        $answer->value = $request->value;
        $question->answers()->save($answer);
        $question_nr++;
        return Redirect::route('scans.director', compact('scan', 'thema_nr', 'question_nr'));
    }

    public function algemeenbeeldresultaat(Scan $scan)
    {
        // $instanties = [];
        // foreach($scan->instanties as $instantie)
        // {
        //     $instanties[] = $instantie->with('participants')->get();
        // }
        JavaScript::put([
            'scan' => $scan,
            'thema_id' => 0,
            // 'instanties' => $instanties,
        ]);
        return view ('scans.algemeenbeeldresultaat', compact('scan'));
    }

    public function store_prebeteracties(Request $request, Scan $scan, $thema_nr)
    {
        $thema = $scan->scanmodel->themas->get($thema_nr - 1);

        foreach($thema->questions as $question)
        {
            $question->verbeteractie->active = false;
            if (count(collect($request->verbeteractie)->intersect([$question->id])) > 0) 
            {
                $question->verbeteractie->active = true;
            } 
            $question->verbeteractie->save();
        }
        return Redirect::route('scans.director', [$scan, $thema_nr, 10000]) ;
    }

    public function actieoverzicht(Scan $scan)
    {
        $participantlist = [];
        foreach($scan->participants as $participant)
        {
            $participantlist[] = $participant;
        }
        // JavaScript::put($themalist);
        JavaScript::put([
            'scan' => $scan,
            'participants' => $participantlist,
        ]);
        $participantlist["0"] = ' ';
        $participantlist = array_merge($participantlist, $scan->participants->lists('name_first', 'id')->all());
        // return $participantlist;
        return view ('scans.actieoverzicht', compact('scan', 'participantlist'));
    }

    public function post_verbeteracties(Request $request, Scan $scan)
    {
        

        /**
         * dit is voor de verbeteractie agenda
         */
        // $verbeteractie = new Verbeteractie();
        // $verbeteractie->omschrijving
        // $verbeteractie->thema()->save($thema);
        // $verbetaractie->scan()->save($scan);
        // $verbeteractie->trekker()->save($trekker);
        // foreach($betrokkennen as $betrokkenne)
        // {
            // $betrokkenne->verbeteracties()->save($verbeteractie);
        // }
        // 
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

    public function voorzitterscans(Scan $scan)
    {
        $user = Auth::user();
        $scans = $user->beheert->all();
        if(count($scans) > 1)
        {
            return view ('scans.voorzitterscans', compact('scans'));
        } elseif (count($scans) < 1){
            return Redirect::route('home');
        }
        return Redirect::route('scans.invoerendeelnemers', $user->beheert->first());

    }

    public function invoerendeelnemers(Scan $scan)
    {
        $instantieoptions = [];
        foreach($scan->instanties as $instantie)
        {
            if(count($instantie->participants) < 2)
            {
                $instantieoptions[$instantie->id] = $instantie->title;
            }
        }
        JavaScript::put([
            'scan' => $scan,
        ]);
        return view ('scans.inrichten.invoerendeelnemers', compact('scan', 'instantieoptions'));
    }

    public function editinvoerdeelnemer(Scan $scan, User $user)
    {
        $instantieoptions = [];
        foreach($scan->instanties as $instantie)
        {
            $hasinstantie = ($user->instanties->intersect($scan->instanties) == $instantie);
            if(count($instantie->participants) < 2 || $hasinstantie )
            {
                $instantieoptions[$instantie->id] = $instantie->title;
            }
        }

        return view('scans.inrichten.invoerendeelnemers', compact('scan', 'instantieoptions', 'user'));
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
        $instantie->participants()->save($user);

        return Redirect::back();    
    }

    public function controlerendeelnemers(Scan $scan)
    {
        JavaScript::put([
            'scan' => $scan,
        ]);
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
        $instantie->participants()->save($user);

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
    public function edit(Scan $scan)
    {
        $scanmodels = Scanmodel::findOrFail(1)->instantiemodels->lists('title', 'id');
        return view ('scans.edit', compact('scan', 'scanmodels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scan $scan)
    {
        // return 'fuck this';
        // return $request->all();
    }

    public function video(Scan $scan)
    {
        $videolist = Video::lists('title', 'id');
        return view('scans.video', compact('scan', 'videolist'));
        
    }

    public function updatevideo(Request $request, Scan $scan)
    {
        $scan->scanmodel->video_id = $request->video_id;
        $scan->scanmodel->save(); 
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scan $scan)
    {

        $scan->delete();  

        return redirect()->back();      
    }

    public function updatetitle(Scan $scan, Request $request)
    {
        $scan->title = $request->title;
        $scan->save();
        return redirect()->back();
    }

    public function updateregio(Scan $scan, Request $request)
    {
        $scan->regio = $request->regio;
        $scan->save();
        return redirect()->back();
    }

    public function updatebeheerder(Scan $scan, Request $request)
    {


        if (! User::where('email', '=', $request->beheerder_email)->get()->count())
        {
            $user = new User();
            $user->initial_pwd = str_random(8);
            $user->password = Hash::make($user->initial_pwd);
            $user->email = $request->beheerder_email;
            $user->save();
        }
        $user = User::where('email', '=', $request->beheerder_email)->first();
        $user->beheert()->save($scan);

        $scan->save();
        return redirect()->back();
    }

    public function updateinstantie(Scan $scan, Request $request)
    {
        $user = $scan->beheerder;
        $instantie = Instantie::findOrFail($request->instantie);
        // $instantie->users->save($user);
        foreach($user->instanties->intersect($scan->instanties) as $this_instantie)
        {
            $user->instanties()->detach($this_instantie);
        }
        $user->instanties()->save($instantie);        

        return redirect()->back();
    }
}
