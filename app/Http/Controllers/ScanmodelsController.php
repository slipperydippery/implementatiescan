<?php

namespace App\Http\Controllers;

use App\Thema;
use App\Scanmodel;
use App\Http\Requests;
use Illuminate\Http\Request;

class ScanmodelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scanmodels = Scanmodel::get();
        return view ('scanmodels.index', compact('scanmodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($scanmodel)
    {
        $themalist = Thema::lists('title', 'id');
        return view ('scanmodels.show', compact('scanmodel', 'themalist'));
    }

    public function addthema(Request $request)
    {
        // return ($request->thema_id);
        $thema = Thema::findOrFail($request->thema_id);
        $scanmodel = Scanmodel::findOrFail($request->scanmodel_id);
        $scanmodel->themas()->save($thema);
        $themalist = Thema::lists('title', 'id');
        return Redirect::route('scanmodels.show', compact('scanmodel', 'themalist'));
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
