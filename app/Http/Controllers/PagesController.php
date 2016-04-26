<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    public function testpage ()
    {
    	return view ('pages.testpage');
    }

    public function databank()
    {
    	return view('pages.databank');
    }
}
