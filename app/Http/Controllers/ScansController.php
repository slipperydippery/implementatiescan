<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Thema;
use App\Video;
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
        // return $request;
        $scan = new Scan($request->all());
        // return $scan;
        if (! User::where('email', '=', $request->beheerder_email)->get()->count())
        {
            $user = new User();
            $user->email = $request->beheerder_email;
            $user->save();
        }
        $user = User::where('email', '=', $request->beheerder_email)->first();
        // return $user->id;
        $scan->user_id = $user->id;
        // return $user->id;
        // $question->order = ($question->questionable->questions->count() > 0) ? $question->questionable->questions->sortByDesc('order')->first()->order + 1 : 1;
        $scan->save();
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
        return view ('scans.show', compact('scan', 'themalist'));
    }

    public function addthema(Request $request)
    {
        // return ($request->thema_id);
        $thema = Thema::findOrFail($request->thema_id);
        $scan = Scan::findOrFail($request->scan_id);
        $scan->themas()->save($thema);
        $themalist = Thema::lists('title', 'id');
        return Redirect::route('scans.show', compact('scan', 'themalist'));
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
