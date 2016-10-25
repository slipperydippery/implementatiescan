<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ConsultantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function createwithscan(Scan $scan)
    {
    	return view ('consultants.create', compact('scan'));
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

    public function storewithscan(Request $request, Scan $scan)
    {
    	if($request->email == '') {
    		$user = new User();
            $user->name_first = $request->name_first;
            $user->name_last = $request->name_last;
            $user->save();
    	}
    	else {
	    	if(! User::where('email', '=', $request->email)->get()->count()) {
	    		$user = new User();
	            $user->initial_pwd = str_random(8);
	            $user->password = Hash::make($user->initial_pwd);
	            $user->email = $request->email;
	            $user->name_first = $request->name_first;
	            $user->name_last = $request->name_last;
	            $user->save();
	    	}
	    	$user = User::where('email', '=', $request->email)->first();
    	}
    	$user->consults()->save($scan);
        return Redirect::route('scans.actieoverzicht', $scan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
