<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scan;
use App\Http\Requests;

class WerkagendasController extends Controller
{
    public function store_omschrijving(Request $request, Scan $scan)
    {
    	Return $request->all();
    }
}
