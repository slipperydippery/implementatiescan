<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\Scan;
use JavaScript;
use App\Http\Requests;
use Illuminate\Http\Request;

class InrichtenController extends Controller
{
	public function overzichtscans()
	{
		$user = Auth::user();
		$scans = $user->beheert->all();
		if(count($scans) > 1) {
		    return view ('scans.inrichten.overzichtscans', compact('scans'));
		} elseif (count($scans) < 1) {
		    return Redirect::route('home');
		}
		return Redirect::route('scans.inrichten.instructiefilm', $user->beheert->first());
	}

    public function instructiefilm(Scan $scan)
    {
        return view ('scans.inrichten.instructiefilm', compact('scan'));
    }

    public function invoerendeelnemers(Scan $scan)
    {
    	JavaScript::put([
    	    'scan' => $scan,
    	]);
    	return view ('scans.inrichten.invoerendeelnemers', compact('scan'));
    }

    public function controlerendeelnemers(Scan $scan)
    {
    	$instantieoptions = [];
    	foreach($scan->instanties as $instantie) {
	        $instantieoptions[$instantie->id] = $instantie->title ;
		}
    	JavaScript::put([
    	    'scan' => $scan,
    	    'scanbeheerder' => Auth::user(),
    	    'kennismaken' => false,
    	]);
    	return view ('scans.inrichten.controlerendeelnemers', compact('scan', 'instantieoptions'));
    }

    public function uitnodigendeelnemers(Scan $scan)
    {
    	return view('scans.inrichten.uitnodigendeelnemers', compact('scan'));
    }

    public function mailverstuurd(Scan $scan)
    {
    	return view('scans.inrichten.mailverstuurd');
    }
}
