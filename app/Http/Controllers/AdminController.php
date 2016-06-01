<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginasuser($user_id)
    {
    	Auth::loginUsingId($user_id);
    	return redirect()->back();
    }
}
