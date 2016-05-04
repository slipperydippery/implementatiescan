<?php

namespace App\Http\Controllers;

use Auth;
use App\Scan;
use App\User;
use App\Thema;
use App\Video;
use App\Answer;
use App\Instantie;
use App\Http\Requests;
use Illuminate\Http\Request;
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
        $videolist = Video::lists('title', 'id');
        return view ('scans.create', compact('videolist'));
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
        // $scan->beheerder()->save($user);
        $scan->save();
        foreach($scan->scanmodel->instantiemodels as $instantiemodel)
        {
            $instantie = new Instantie();
            $instantie->title = $instantiemodel->title;
            $instantie->blurb = $instantiemodel->blurb;
            $instantie->scan_id = $scan->id;
            $instantie->save();
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
        $themalist = Thema::lists('title', 'id');
        return view ('scans.show', compact('scan', 'themalist', 'beheerder'));
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
        $video = $scan->scanmodel->video;
        return view ('scans.intro', compact('video', 'scan'));
    }

    public function kennismaken(Scan $scan)
    {
        return view ('scans.kennismaken', compact('scan'));
    }

    public function algemeenbeeld(Scan $scan)
    {
        return view ('scans.algemeenbeeld', compact('scan'));
    }

    public function store_algemeenbeeld(Scan $scan, Request $request)
    {
        // return $request->all();
        $user = Auth::user();
        $answer = new Answer();
        // $answer->save();
        $answer->user_id = $user->id;
        $answer->value = $request->value;
        // $answer->answerable()->save($scan);
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
        return view ('scans.actiesmailen', $scan);
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
