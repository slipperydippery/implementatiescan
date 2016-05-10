<?php

namespace App\Http\Controllers;

use Gate;
use App\Scan;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function home()
    {
        $scan = Scan::findOrFail(2);
        return view ('welcome', compact('scan')) ;
    }

    public function bedankt(    )
    {
        $scan = Scan::findOrFail(2);
        return view('pages.voorzitter.bedankt', compact('scan'));
    }
    
    public function testpage ()
    {
        return view ('pages.testpage');
    }
    
    public function foundation ()
    {
        return view ('pages.foundation');
    }

    public function databank()
    {
    	return view('pages.databank');
    }
}
