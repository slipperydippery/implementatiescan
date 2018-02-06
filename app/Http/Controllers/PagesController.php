<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use App\Scan;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{

    public function home()
    {
        return view ('participatiescan');
        return view ('welcome') ;
    }

    public function bedankt()
    {
        return view('pages.voorzitter.bedankt');
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

    public function qanda()
    {
        return view('pages.qanda');
    }

    public function emails()
    {
        $users = User::get();
        $emails = '';
        foreach($users as $user) {
            $emails .= $user->email . "; ";
        }
        return $emails;

    }
}
