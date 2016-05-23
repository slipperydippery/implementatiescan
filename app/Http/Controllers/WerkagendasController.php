<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Thema;
use App\Http\Requests;
use App\Verbeteractie;
use Illuminate\Http\Request;

class WerkagendasController extends Controller
{

    public function verbeteracties( $thema)
    {
        $thema = Thema::findOrFail($thema);
        return $thema->verbeteracties;
    }

    public function store_omschrijving(Request $request, Scan $scan)
    {
    	$verbeteractie = Verbeteractie::findOrFail($request->verbeteractie_id);
    	$verbeteractie->omschrijving = ($request->actiepunt);
    	$verbeteractie->save();
    	return redirect()->back();
    }

    public function store_trekker(Request $request, Scan $scan)
    {
    	$verbeteractie = Verbeteractie::findOrFail($request->verbeteractie_id);
    	$trekker = User::findOrFail($request->trekker_id);
    	$verbeteractie->trekker()->save($trekker);
    	$verbeteractie->save();
    	return redirect()->back();
    }

    public function store_changes(Request $request, Scan $scan)
    {
    	// return $request->all();
    	$verbeteractie = Verbeteractie::findOrFail($request->verbeteractie_id);
    	$verbeteractie->omschrijving = ($request->actiepunt);
    	if($request->trekker_id != 0){
    		$trekker = User::findOrFail($request->trekker_id);
	    	// return ($trekker->name_first);
	    	$trekker->trektVerbeteracties()->save($verbeteractie);
    	}

    	$verbeteractie->save();
    	return redirect()->back();
    }

    public function updateActie()
    {
        return 'yeah';
        
    }
}
